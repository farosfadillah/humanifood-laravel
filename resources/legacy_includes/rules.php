    <style>
        /* MAIN */

        * {
            box-sizing: border-box;
        }

        body {margin: 0px auto;}
        a:not(.td-true) {text-decoration: none;}

        img {max-width: 100%;}

        .text-center {text-align: center;}

        /* CONTAINER */

        /* FLEX */
        .d-flex {display: flex;}
        .d-flex.space-between {justify-content: space-between;}
        
        /* GRID */
        .grid {display: grid;gap: 16px;}
        .grid-1,
        .grid-2,
        .grid-3 {grid-template-columns: repeat(1,1fr);}
        .grid-4,
        .grid-5,
        .grid-6 {grid-template-columns: repeat(2,1fr);}

        .inside-block * {display: block;}

        @media (min-width: 576px) {
            .grid-2,
            .grid-3 {grid-template-columns: repeat(2, 1fr);}
        }

        @media (min-width: 768px) {
            .grid-3, .grid-4, .grid-5, .grid-6 {grid-template-columns: repeat(3,1fr);}
        }

        @media (min-width: 992px) {

        }

        @media (min-width: 1200px) {
            .grid-4 {grid-template-columns: repeat(4,1fr);}
            .grid-5 {grid-template-columns: repeat(5,1fr);}
        }

        .grid .col {
            border-radius: 10px;
            overflow: hidden;
            padding: 0px 0px 55px;
            color: #EFEFEF;
            background: rgb(158, 33, 33);
            position: relative;
            width: 100%;
        }

        .col .img {
            aspect-ratio: 16/12;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .col .info {background: rgb(158, 33, 33);}

        .col a {color: #EFEFEF;}
        .col .info h3 {margin: 0px 0px 5px;font-weight: normal;font-size: 27px;}
        .col h4 {font-weight: normal;font-size: 20px;margin: 0px 0px;display: inline-block;border-bottom: 1px solid #EFEFEF;padding-bottom: 3px;}
        .col span {font-size: 13.5px;}

        /* CONTAIENR */
        .container {
            margin: 0px auto;
            width: 100%;
            max-width: 992px;
        }

        #content-wrapper {
            /* background: white; */
            padding: 32px 0px;
        }

        /*  */
        .col.product img {
            object-fit: cover;
            aspect-ratio: 4/2.25;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }

        @media(max-width: 1160px) {
            .container {
                padding: 0px 15px;
            }
        }

        textarea {resize: none;}
    </style>
