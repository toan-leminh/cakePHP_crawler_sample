<?php $this->assign( 'title', "クローラーサンプル"); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><small>クローラーサンプル</small>
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
            <label class="control-label col-sm-2" for="item_amount">ISBN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="isbn" placeholder="ISBN">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">書名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" placeholder="書名">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="author">著者名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="author" placeholder="著者名">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">検索</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<!-- /.row -->