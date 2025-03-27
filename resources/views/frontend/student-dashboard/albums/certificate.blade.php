<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Certificate</title>

    <head>
        <style>
            .certificate-body {
                width: 930px;
                height: 600px;
                background: gray;
                background-repeat: no-repeat;
                text-align: center;
            }

            body {
                margin: 0;
                padding: 0;
            }

            @page {
                size: 930px 600px;
                margin: 0;
            }

            .certificate-body div,
            .certificate-body img {
                position: relative;
            }

            .certificate-body .title {
                font-size: 20px;
                font-weight: 600;
                position: relative;
            }

            .certificate-body .subtitle {
                font-size: 18px;
                font-weight: 400;
                position: relative;
            }

            @foreach ($certificateItems as $item)
                #{{ $item->element_id }} {
                    left: {{ $item->x_position }}px;
                    top: {{ $item->y_position }}px;
                }
            @endforeach
        </style>
    </head>
</head>

<body>
    <div class="certificate-body" style="background-image: url({{ public_path(@$certificate->background) }});">
        <div id="title" class="title draggable-element">{{ @$certificate->title }}</div>
        <div id="sub_title" class="subtitle draggable-element">{{ @$certificate->sub_title }}</div>
        <div id="description" class="description draggable-element">{!! @$certificate->description !!}</div>
        <img id="signature" class="draggable-element" src="{{ public_path(@$certificate->signature) }}">
    </div>
</body>

</html>
