<h2><?php echo $data['item'][0]['title'] ?></h2>

<img src="<?php echo $data['item'][0]['image'] ?>" height="300">
<br>
<br>
<p><?php echo $data['item'][0]['content'] ?></p>

<div style="color: black"><i class="glyphicon glyphicon-eye-open"></i>
    <span id="visitors" class="visitor"><?php echo $data['visitors_now'] ?></span>
    [сейчас читают]
</div>

<div id="news" style="color: black" news="<?php echo $data['item'][0]['id'] ?>">
    <i class="glyphicon glyphicon-eye-open"></i>
    <span id="visitors_all" class="visitor"></span>
    [всего]
</div>
<!---->

<div>
    <?php foreach ($data['tags'] as $tag) : ?>
        <?php if ($tag): ?>
            <a class="item-tags" href="/item/tags/<?php echo $tag ?>/page-1">#<?php echo $tag ?></a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<!---->
<hr>
<h2>Комментарии</h2>
<div>
    <?php if (isset($data['comments']) && $data['comments']) : ?>
        <?php foreach ($data['comments'] as $comment) : ?>
            <?php if ($data['item'][0]['category_title'] !== 'Политика') : ?>
                <?php if ($comment['parent_comment'] == 0) : ?>
                    <?php if ($comment['news_id'] == $data['item'][0]['id']) : ?>
                        <div style="border: 1px dashed rgba(0, 0, 0, 0.1); padding: 10px; padding-left: 30px; background-color: #0A246A; border: 2px solid gold">
                            <p style="color: #EEEE00"><?php echo $comment['content'] ?></p>
                            <small style="color: darkgoldenrod">Автор: <?php echo $comment['user'] ?></small> |
                            <small style="color: crimson">Оценка: <?php echo $comment['rate'] ?></small> |
                            <small style="color: gray">Дата: <?php echo $comment['date'] ?></small>
                            <br>
                            <br>
                            <div>
                            <a href="/comments/plusRate/<?php echo $comment['id'] ?>/<?php echo $data['item'][0]['id'] ?>"
                               class="btn btn-xs btn-success" name="+" style="border-radius: 50%"><i class="glyphicon glyphicon-plus"></i></a>
                            <a href="/comments/minusRate/<?php echo $comment['id'] ?>/<?php echo $data['item'][0]['id'] ?>"
                               class="btn btn-xs btn-danger" name="-" style="border-radius: 50%"><i class="glyphicon glyphicon-minus"></i></a>
                            </div>

                            <?php if (isset($_SESSION['login']) && $_SESSION['login']) : ?>
                                <!---->
                                <br>
                                <div class="open_subcomment" style="display: inline;">
                                    <button class="pull-right btn btn-xs btn-success">Ответить</button>
                                    <br><br>

                                    <div class="subcomment pull-right"
                                         style="border: 1px solid #ccc; padding: 5px; display: none; background-color: white;">

                                        <form action="/comments/addComment/" method="post">
                                            <?php if ($data['item'][0]['category_title'] == 'politic') : ?>
                                                <input type="hidden" name="politic" value="politic">
                                            <?php endif; ?>
                                            <input type="text" name="content" class="form-control"><br>
                                            <input type="hidden" name="parent" value="<?php echo $comment['id'] ?>"
                                                   class="btn btn-success">
                                            <input type="hidden" name="news_id"
                                                   value="<?php echo $comment['news_id'] ?>"
                                                   class="btn btn-success">
                                            <input type="submit" class="btn btn-success">
                                        </form>

                                    </div>
                                </div>
                            <?php endif; ?>


                            <!---->

                            <?php if (isset($_SESSION["time_comment_id-{$comment['id']}"]) && (time() < ($_SESSION["time_comment_id-{$comment['id']}"] + 60))) : ?>
                                <br><br>
                                <a href="/comments/edidcomment/<?php echo $comment['id'] ?>/<?php echo $data['item'][0]['id'] ?>">Редактировать
                                    комментарий</a>
                            <?php endif; ?>
                            <!---->


                            <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->


                            <!---->
                            <hr>
                            <?php foreach ($data['comments'] as $subcoment) : ?>
                                <?php if ($subcoment['parent_comment'] == $comment['id']) : ?>
                                    <?php if ($subcoment['news_id'] == $data['item'][0]['id']) : ?>
                                        <div class="" style="background-color: #305075; width: 400px; border: 2px dashed darkred">
                                            <p style="color: #EEEE00"><?php echo $subcoment['content'] ?></p>
                                            <small style="color: darkgoldenrod">Автор: <?php echo $subcoment['user'] ?></small> |
                                            <small style="color: crimson">Оценка: <?php echo $subcoment['rate'] ?></small> |
                                            <small style="color: gray">Дата: <?php echo $subcoment['date'] ?></small>
                                            <br>
                                            <br>
                                            <div>
                                                <a href="/comments/plusRate/<?php echo $subcoment['id'] ?>/<?php echo $data['item'][0]['id'] ?>"
                                                   class="btn btn-xs btn-success" name="+" style="border-radius: 50%"><i class="glyphicon glyphicon-plus"></i></a>
                                                <a href="/comments/minusRate/<?php echo $subcoment['id'] ?>/<?php echo $data['item'][0]['id'] ?>"
                                                   class="btn btn-xs btn-danger" name="-" style="border-radius: 50%"><i class="glyphicon glyphicon-minus"></i></a>
                                            </div>
                                            <br>
                                            <?php if (isset($_SESSION["time_comment_id-{$subcoment['id']}"]) && (time() < ($_SESSION["time_comment_id-{$subcoment['id']}"] + 60))) : ?>
                                                <a href="/comments/edidcomment/<?php echo $subcoment['id'] ?>/<?php echo $data['item'][0]['id'] ?>">Редактировать
                                                    комментарий</a>
                                            <?php endif; ?>
                                            <!---->
                                        </div>
                                        <br>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>


                            <!---->
                        </div>
                        <br>
                    <?php endif; ?>
                <?php endif; ?>
            <?php elseif ($comment['not_politic']):?>

                <!---------------------------------------------------------------------->


                    <?php if ($comment['news_id'] == $data['item'][0]['id']) : ?>
                        <div style="border: 1px dashed rosybrown; padding: 10px; padding-left: 30px;">
                            <p style="color: #EEEE00"><?php echo $comment['content'] ?></p>
                            <small style="color: darkgoldenrod">Автор: <?php echo $comment['user'] ?></small> |
                            <small style="color: crimson">Оценка: <?php echo $comment['rate'] ?></small> |
                            <small style="color: gray">Дата: <?php echo $comment['date'] ?></small>
                            <br>
                            <br>
                            <div>
                                <a href="/comments/plusRate/<?php echo $comment['id'] ?>/<?php echo $data['item'][0]['id'] ?>"
                                   class="btn btn-xs btn-success" name="+" style="border-radius: 50%"><i class="glyphicon glyphicon-plus"></i></a>
                                <a href="/comments/minusRate/<?php echo $comment['id'] ?>/<?php echo $data['item'][0]['id'] ?>"
                                   class="btn btn-xs btn-danger" name="-" style="border-radius: 50%"><i class="glyphicon glyphicon-minus"></i></a>
                            </div>
                            <br>
                        </div>
                        <br>
                    <?php endif; ?>

                <!---------------------------------------------------------------------->
            <?php else: ?>
                <?php echo "<div style='width: 400px; border: 2px dotted saddlebrown; padding: 20px;'><b style='color: goldenrod'>Комментарий проходит модерацию!</b></div><br>" ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <?php echo "<b style='color: chocolate'>Еще нету ни одного комментария</b>" ?>
    <?php endif; ?>
</div>
<br>
<div style="background-color: #EEEE00; height: 2px"></div>
<?php if (isset($_SESSION['login']) && $_SESSION['login']) : ?>
    <form action="/comments/addComment/" method="post">
        <h4>Здравствуйте, <b><?php echo $_SESSION['login'] ?></b>. Оставьте свой комментарий!</h4>
        <input type="hidden" name="action" value="action">
        <input type="hidden" name="news_id" value="<?php echo $data['item'][0]['id'] ?>">
        <?php if ($data['item'][0]['category_title'] === 'Политика') : ?>
            <input type="hidden" name="politic" value="politic">
        <?php endif; ?>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <input type="text" id="comment" name="comment" value="" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-success" value="Отправить">
    </form>
	<br>
<?php endif; ?>