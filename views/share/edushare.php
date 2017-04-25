<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" type="image/x-icon"
          href="/favicon.ico">
    <title><?= $share['title'] ?></title>

    <style>html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 1.6
        }

        body {
            -webkit-touch-callout: none;
            font-family: -apple-system-font, "Helvetica Neue", "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", sans-serif;
            background-color: #f3f3f3;
            line-height: inherit
        }

        body.rich_media_empty_extra .rich_media_area_primary:before {
            display: none
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 400;
            font-size: 16px
        }

        * {
            margin: 0;
            padding: 0
        }

        a {
            color: #607fa6;
            text-decoration: none
        }

        .rich_media_inner {
            font-size: 16px;
            word-wrap: break-word;
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
            hyphens: auto
        }

        .rich_media_title,.rich_media_meta_list{
            text-align: center;
        }

        .rich_media_area_primary {
            position: relative;
            padding: 20px 15px 15px;
            background-color: #fff
        }

        .rich_media_area_primary:before {
            content: " ";
            position: absolute;
            left: 0;
            width: 100%;
            height: 1px;
            border-top: 1px solid #e5e5e5;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            -webkit-transform: scaleY(0.5);
            transform: scaleY(0.5);
            top: auto;
            bottom: -2px
        }

        .rich_media_area_primary .original_img_wrp {
            display: inline-block;
            font-size: 0
        }

        .rich_media_area_primary .original_img_wrp .tips_global {
            display: block;
            margin-top: .5em;
            font-size: 14px;
            text-align: right;
            width: auto;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            word-wrap: normal
        }

        .rich_media_title {
            margin-bottom: 10px;
            line-height: 1.4;
            font-weight: 400;
            font-size: 24px
        }

        .rich_media_meta_list {
            margin-bottom: 18px;
            line-height: 20px;
            font-size: 0
        }

        .rich_media_meta_list em {
            font-style: normal
        }

        .rich_media_meta {
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
            margin-bottom: 10px;
            font-size: 16px
        }

        .meta_original_tag {
            display: inline-block;
            vertical-align: middle;
            padding: 1px .5em;
            border: 1px solid #9e9e9e;
            color: #8c8c8c;
            border-top-left-radius: 20% 50%;
            -moz-border-radius-topleft: 20% 50%;
            -webkit-border-top-left-radius: 20% 50%;
            border-top-right-radius: 20% 50%;
            -moz-border-radius-topright: 20% 50%;
            -webkit-border-top-right-radius: 20% 50%;
            border-bottom-left-radius: 20% 50%;
            -moz-border-radius-bottomleft: 20% 50%;
            -webkit-border-bottom-left-radius: 20% 50%;
            border-bottom-right-radius: 20% 50%;
            -moz-border-radius-bottomright: 20% 50%;
            -webkit-border-bottom-right-radius: 20% 50%;
            font-size: 15px;
            line-height: 1.1
        }

        .meta_enterprise_tag img {
            width: 30px;
            height: 30px !important;
            display: block;
            position: relative;
            margin-top: -3px;
            border: 0
        }

        .rich_media_meta_text {
            color: #8c8c8c
        }

        .rich_media_content {
            overflow: hidden;
            color: #3e3e3e
        }

        .rich_media_content * {
            max-width: 100% !important;
            box-sizing: border-box !important;
            -webkit-box-sizing: border-box !important;
            word-wrap: break-word !important
        }

        .rich_media_content p {
            clear: both;
            min-height: 1em;
            white-space: pre-wrap
        }

        .rich_media_content em {
            font-style: italic
        }

        .rich_media_content fieldset {
            min-width: 0
        }

        .rich_media_content blockquote {
            margin: 0;
            padding-left: 10px;
            border-left: 3px solid #dbdbdb
        }

        img {
            height: auto !important
        }

        @media (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) {
            .mm_appmsg .rich_media_inner, .mm_appmsg .rich_media_meta, .mm_appmsg .discuss_list, .mm_appmsg .rich_media_extra, .mm_appmsg .title_tips .tips {
                font-size: 17px
            }

            .mm_appmsg .meta_original_tag {
                font-size: 15px
            }
        }

        @media (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) {
            .mm_appmsg .rich_media_title {
                font-size: 25px
            }
        }

        @media screen and (min-width: 1024px) {
            .rich_media {
                width: 740px;
                margin-left: auto;
                margin-right: auto
            }

            .rich_media_inner {
                padding: 20px
            }

            body {
                background-color: #fff
            }
        }

        @media screen and (min-width: 1025px) {
            body {
                font-family: "Helvetica Neue", Helvetica, "Hiragino Sans GB", "Microsoft YaHei", Arial, sans-serif
            }

            .rich_media {
                position: relative
            }

            .rich_media_inner {
                background-color: #fff;
                padding-bottom: 100px
            }
        }

        .radius_avatar img {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            background-color: #eee
        }


        .original_tool_area .radius_avatar img {
            height: 100% !important
        }

        @-webkit-keyframes weuiLoading {
            0% {
                -webkit-transform: rotate3d(0, 0, 1, 0deg)
            }
            100% {
                -webkit-transform: rotate3d(0, 0, 1, 360deg)
            }
        }

        @keyframes weuiLoading {
            0% {
                -webkit-transform: rotate3d(0, 0, 1, 0deg)
            }
            100% {
                -webkit-transform: rotate3d(0, 0, 1, 360deg)
            }
        }

        .gif_img_wrp img {
            vertical-align: top
        }

        .gif_img_tips i {
            vertical-align: middle;
            margin: -0.2em .73em 0 -2px
        }

        .preview_appmsg .rich_media_title {
            margin-top: 1.9em
        }

        @media screen and (min-width: 1024px) {
            .preview_appmsg .rich_media_title {
                margin-top: 0
            }
        }</style>
</head>
<body id="activity-detail" class="zh_CN mm_appmsg" ontouchstart="">
<div id="js_article" class="rich_media">
    <div class="rich_media_inner">
        <div id="page-content">
            <div id="img-content" class="rich_media_area_primary">
                <h2 class="rich_media_title" id="activity-name">
                    <?= $share['title'] ?>
                </h2>
                <div class="rich_media_meta_list">
                    <span id="copyright_logo" class="rich_media_meta meta_original_tag">原创</span>
                    <em id="post-date" class="rich_media_meta rich_media_meta_text"><?= $share['createTime'] ?></em>
                    <a class="rich_media_meta rich_media_meta_link rich_media_meta_nickname" href="http://www.bjtcgx.com" id="post-user" target="_blank">顺道嘉</a>
                </div>
                <div class="rich_media_content " id="js_content">
                    <?php echo stripslashes($share['content']);
                        echo '<div class="qrcode"><img src="'.$code.'" style="display: block;margin: 0 auto;"></div>';
                    ?>
                </div>
            </div>
        </div>


    </div>
</div>
</body>
</html>