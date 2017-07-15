<?php $this->assign( 'title', "クローラーサンプル"); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><small>クローラーサンプル（アマゾン書籍の検索）</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>サンプル</li>
        </ol>
    </div>
</div>
<!-- /.row -->

<!-- Intro Content -->
<div class="row">
    <div class="col-lg-12">
        <h4>アマゾン書籍の検索</h4>
        <?= $this->Form->create(null, ['class' => 'form-horizontal'])?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="item_currency">クローラー対象サイト</label>
            <div class="col-sm-10">
                <!--                            <input type="text" class="form-control" name="item_currency" placeholder="Item Amount Currency">-->
                <select class="form-control" name="craw_site" placeholder="Item Amount Currency">
                    <option value="amazonJP">アマゾン JP</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="item_amount">本のISBN</label>
            <div class="col-sm-10">
                <?= $this->Form->input('isbn', ['class' => 'form-control', 'placeholder' => 'ISBN', 'label'=> false] ) ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">書名</label>
            <div class="col-sm-10">
                <?= $this->Form->input('title', ['class' => 'form-control', 'placeholder' => '書名', 'label'=> false ]  ) ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="author">著者名</label>
            <div class="col-sm-10">
                <?= $this->Form->input('author', ['class' => 'form-control', 'placeholder' => '著者名', 'label'=> false ]) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 text-center">
                <button type="submit" class="btn btn-default">検索</button>
            </div>
        </div>
        <?= $this->Form->end() ?>

        <table class="table table-bordered table-strip dataTable">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>タイトル</th>
                    <th>単価（円）</th>
                </tr>
            </thead>
            <tbody>
            <?php if(count($bookList)): ?>
                <?php foreach($bookList as $book) :?>
                    <tr>
                        <td><?= $book['isbn'] ?></td>
                        <td><?= $book['title']?></td>
                        <td><?= $book['price']?></td>
                    </tr>

                <?php endforeach ?>
            <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.row -->