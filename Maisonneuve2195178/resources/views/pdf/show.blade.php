<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>PDF</title>
    <style>
        /** Define the margins of your page **/
        /* source:https://ourcodeworld.com/articles/read/687/how-to-configure-a-header-and-footer-in-dompdf */
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>

        @lang('lang.text_title') : {{ ucfirst($post->title) }}
    </header>

    <footer>
        Auteur: {{$post->blogHasUser->name}}
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p style="page-break-after: never;">
            {!! $post->body !!}
        </p>

    </main>
</body>

</html>