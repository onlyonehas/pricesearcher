<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ActionItems;


class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $actionTypes = $this->getDoctrine()->getRepository(ActionItems::class)->findAll();
        $host = $_SERVER['HTTP_HOST'];

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'actionTypes' => $actionTypes,
            'host' => $host
        ]);
    }


    /**
     * @Route("/{id}", name="id")
     */
    public function id($id)
    {
        $actionTypes = $this->getDoctrine()->getRepository(ActionItems::class)->find($id);
        $host = $_SERVER['HTTP_HOST'];


        return $this->render('index/upload.html.twig', [
            'controller_name' => 'IndexController',
            'actionTypes' => $actionTypes,
            'host' => $host
        ]);
    }



    /**
     * @Route("/{id}/upload", name="upload")
     */
    public function upload($id)
    {
        $host = $_SERVER['HTTP_HOST'];
        $target_dir = '\\templates\\index\\img\\';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        $dirpath = realpath(dirname(getcwd()));
        $filePath = $dirpath.$target_file;

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

            // if everything is ok, try to upload file
        } else {
            try {
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filePath)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                }
            } catch  (Exception $e) {
                echo "Sorry, there was an error uploading your file.",$e->getMessage();
                $uploadOk = 0;
            }
        }

        if($uploadOk == 1){
            $entityManager = $this->getDoctrine()->getManager();
            $updateAction = $entityManager->getRepository(ActionItems::class)->find($id);
            $updateAction->setStatus("Done");
            $updateAction->setFileLocation(str_replace('\\', '/', $filePath));
            $entityManager->flush();
        }

        return $this->redirectToRoute('index');
    }

}
