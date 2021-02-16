<?php

require_once "./helper/WhiteList.php";
require_once "./api/views/JSONView.php";
require_once "ApiController.php";
require_once "./models/CommentsModel.php";

class CommentsApiController extends ApiController
{
    function getAverage($params = [])
    {
        $id = $params[':ID'];

        $average = $this->model->getAverage($id);

        if (is_array($average)) {
            $this->view->response($average["average"], 200);
        } else {
            $this->view->response("Error getting average", 500);
        }
    }

    function getCommentsId($params = [])
    {
        $id = $params[':ID'];

        $comments = $this->model->getCommentsId($id);

        if (is_array($comments)) {
            $this->view->response($comments, 200);
        } else {
            $this->view->response("Error getting comments", 500);
        }
    }

    function getCommentsMovie($params = [])
    {
        $id = $params[':ID'];

        $comments = $this->model->getCommentsMovie($id);

        if (is_array($comments)) {
            $this->view->response($comments, 200);
        } else {
            $this->view->response("Error getting comments", 500);
        }
    }

    function getCommentsMovieOrderBy($params = [])
    {
        $id = $params[':ID'];

        if (!empty($_GET["field"]) && (!empty($_GET["order"]))) {
            $field = $_GET["field"];
            $order = $_GET["order"];

            $whiteList = new WhiteList();

            if ($whiteList->isSafeField($field) && $whiteList->isSafeOrder($order))
                $comments = $this->model->getCommentsMovieOrderBy($id, $field, $order);
            else
                $comments = null;

        } else {
            $comments = $this->model->getCommentsMovie($id);
        }

        if (is_array($comments)) {
            $this->view->response($comments, 200);
        } else {
            $this->view->response("Error getting comments", 500);
        }
    }

    function getComments($params = '')
    {
        $comments = $this->model->getComments();

        if (is_array($comments)) {
            $this->view->response($comments, 200);
        } else {
            $this->view->response("Error getting comments", 500);
        }
    }

    function addComment($params = [])
    {
        $comment = $this->getData();

        $commentId = $this->model->insertComment($comment->comment, $comment->user, $comment->score, $comment->id_movie, $comment->id_user);

        $newComment = $this->model->getComment($commentId);

        if ($newComment) {
            $this->view->response($newComment, 200);
        } else {
            $this->view->response("Error inserting task", 500);
        }
    }

    function deleteComment($params = [])
    {
        $id = $params[':ID'];

        $comment = $this->model->deleteComment($id);

        if ($comment) {
            $this->view->response("Error deleting comment", 500);
        } else {
            $this->view->response("Deleted", 200);
        }
    }
}
