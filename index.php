<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\models\Comments;

//use yii\helpers\BaseJson;

$this->title = 'My Yii Application';


?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to my Blog!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <?php
        if (Yii::$app->user->isGuest):

            echo Html::a("Sign Up", ['site/signup', 'id' => 4, 'slug' => "SLUG-VALUE"],
                ["class" => "btn btn-lg btn-success"]);

        endif;
        ?>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <?php foreach ($posts as $item): ?>
                        <?php if ($item['TITLE'] != null): ?>
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?= $item['TITLE'] ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?= $item['DESCRIPTION'] ?>
                                <?php
                                $comment = Comments::findAll(['POST_ID' => $item['POST_ID']]);
                                ?>

                                <ul class="list-group">
                                    <?php foreach ($comment as $row):
                                        ?>
                                        <li class="list-group-item">
                                            <?= $row['CONTENT'] ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <hr/>
                                <?php
                                echo Html::a("Add Comment",
                                    ['post/comments', 'post_id' => $item['POST_ID']],
                                    ["class" => "btn btn-lg btn-info"]);
                                ?>

                            </div>
                        <?php endif; //if($item['TITLE']) ?>
                    <?php endforeach; //  foreach($posts ): ?>
                </div>

            </div>
            <div class="col-lg-2">
            </div>
        </div>

    </div>
</div>
