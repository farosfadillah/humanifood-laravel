    <style>
        :root {
            --primary-color: #9e2121;
        }

        body {
            font-family: 'Calibri';
            background: #FFF;
        }

        :root {
            --primary-color-1: #F6FFDE;
            --primary-color-2: #E3F2C1;
            --primary-color-3: #EFEFEF;
            /* --primary-color-4: #131416; */

            --tx-primary: #EFEFEF;
        }

        nav {
            background: #9e2121;
            height: 70px;
            display: flex;
            align-items: center;
        }

        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a#siteTitle {
            font-size: 28px;
            font-weight: bold;
            color: #EFEFEF;
            padding: 3px 0px;
            display: block;
        }

        nav .menu {
            display: flex;
            align-items: center;
            height: 100%;
            gap: 32px;
            font-size: 14px;
        }
        
        nav .menu .pages {
            display: flex;
            gap: 20px;
            font-size: 15px;
        }

        nav .menu a {
            color: var(--tx-primary);
        }

        nav .menu .pages a {
            font-size: 17.5px;
        }
        
        nav .menu .account a {
            background: rgba(0,0,0, .3);
            padding: 8px 16px;
            display: inline-block;
            border-radius: 2px;
            font-weight: bold;
            color: var(--tx-primary);
        }

        

        footer {
            padding: 32px 0px;
            color: #131416;
            border-top: 1px solid #EFEFEF; 
        }
    </style>
