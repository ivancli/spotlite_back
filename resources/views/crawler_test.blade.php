<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 8/8/2016
 * Time: 2:49 PM
 */
Auth::loginUsingId(1);
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/packages/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <hr>
            <form action="{{url('crawl')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="" class="control-label">URL</label>
                    <input type="text" name="url" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">xPath</label>
                    <input type="text" name="xpath" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-default btn-sm">Start Crawling</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>