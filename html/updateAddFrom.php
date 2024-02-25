<style>
        #updateForm{
            font-size: 20px;
            display:none;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            height: 80%;
            width: 40%;
            padding: 30px;
            padding-top: 50px;
            background-color: #E5E5E5;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        #updateForm::before{
            border: 1px solid black;
            content: '';
            z-index: -1;
            background-color: #F0F0F0;
            box-shadow: 1px 1px 10px black;
            height: 100%;
            width: 100%;
            border-radius: 10px;
            filter: blur(1px);
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        .inputContainer{
            margin: auto;
            width: 90%;
        }
        #updateForm h3{
            position:absolute;
            left:20px;
            top: 10px;
            margin-bottom: 10px;
            text-align: left;
            font-weight: bold;
            font-size: 24px;
            color: #222222;
        }
        #updateForm form input[type='text'],#updateForm form textarea{
            border: none;
            font-size: 16px;
            color: #222222;
            background-color: #F4F4F4;
            border-radius: 5px;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #updateForm form input[type='text']{
            height:40px;
        }
        #updateForm form textarea{
            height: 240px;
            overflow: auto;
            resize: none;
        }

        @media screen and (max-height: 600px) {
            #updateForm form textarea {
                height: 100px;
                max-height: 100px;
            }
        }
        
        #cancel{
            position: absolute;
            right:20px;
            top: 10px;
            width: 32px;
            height: 32px;
            background-image: url(../img/icons/close.png);
            background-size: cover;
            cursor: pointer;
            transition: all .25s;
        }
        #UFInput{
            position: relative;
            margin-top: 20px;
            width: 100%;
        }
        #save {
            left: 50%;
            font-size: 18px;
            height: 42px;
            cursor: pointer;
            width: 100%;
        }

        #updateForm button:hover{
            transform:scale(1.05,1.05);
            transition: all .1s;
        }
</style>
<div id="updateForm">

<form id="formAddUpdate" method="post" action="php/addTheme.php">
    <h3 id="titre" >Update Theme</h3>
    <button id="cancel" class="none" type="reset" onclick="unShow('#updateForm');"></button>
    <div class='inputContainer' >
        <div id='UFInput' >
            <input id="themeInput" name="theme" type="text" placeholder="Teheme" required><br>
            <input id="objectInput" name="object" type="text" placeholder="Objective" required><br>
            <textarea id="detailInput" name="detail" type="textarea" placeholder="Detail" ></textarea><br>
        </div>
        <button id="save" class="button" type="submit" >Submit</button>
    </div>
</form>
</div>