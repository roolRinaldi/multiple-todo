<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List To Do</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    
</head>
<body>
    <main class="app">
        <section class="greeting">
            <h2 class="title">
                What's Your Project, <input type="text" id="name" placeholder="Name here">
            </h2>
        </section>

        <section class="create-todo">
            <h3>Create a To Do List</h3>

            <form method="post" id="new-todo-form">
                <h4>What's on your todo list ?</h4>
                <div class="row fieldGroup">
                    <div class="col">
                        <input class="form-control" type="text" name="content[]" id="content" placeholder="e.g. make a" />
                    </div>
                    <div class="col">
                        <input class="form-control" type="time" name="time[]" id="time" />
                    </div>
                    <div class="col">
                        <input class="form-control" type="date" name="date[]" id="date" />
                    </div>
                    <div class="col-md-1"> 
                        <a href="javascript:void(0)" class="btn btn-success addMore"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <input id="add" type="submit" name="submit" value="Add todo">
            </form>
            <div class="row fieldGroupCopy" style="display: none;">
                    <div class="col">
                        <input class="form-control" type="text" name="content[]" id="content" placeholder="e.g. make a" />
                    </div>
                    <div class="col">
                        <input class="form-control" type="time" name="time[]" id="time" />
                    </div>
                    <div class="col">
                        <input class="form-control" type="date" name="date[]" id="date" />
                    </div>
                    <div class="col-md-1"> 
                        <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            
        </section>

        <section class="todo-list">
            <h3>TODO LIST</h3>
            <div class="list" id="todo-list">
            <?php
                if(isset($_POST['submit'])){
                    $contents = $_POST['content'];
                    $time = $_POST['time'];
                    $tgl = $_POST['date'];
                    if(!empty($contents)){
                        for($a = 0; $a < count($contents); $a++){
                            if(!empty($contents[$a])){
                                $content = $contents[$a];
                                $times = $time[$a];
                                $date = $tgl[$a];
            ?>
                <div class="todo-item">
                    <label>
                        <input type="checkbox" />
                        <span class="bubble business"></span>
                    </label>
                    <div class="todo-content">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="hidden" id="icontent" value="<?= $content ?>" readonly />
                            </div>
                            <div class="col-md-1">
                                <input type="hidden" id="itime" value="<?= $times ?>" readonly />
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" id="idate" value="<?= $date ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="actions">
                        <button class="edit">Edit</button>
                        <button class="delete">delete</button>
                    </div>
                </div>
            <?php
                                //membuat insert data sementara
                                // echo 'Content: '.$content.'; time: '.$times.'; date: '.$date.'</br>';
                            }
                        }
                    }
                }
            ?>
                

                

            </div>
        </section>

    </main>
    <script src="main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
	$(document).ready(function(){
        // membatasi jumlah inputan
        var maxGroup = 5;
        
        //melakukan proses multiple input 
        $(".addMore").click(function(){
            if($('body').find('.fieldGroup').length < maxGroup){
                var fieldHTML = '<div class="row fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroup+' groups are allowed.');
                }
            });
            
            //remove fields group
            $("body").on("click",".remove",function(){ 
                $(this).parents(".fieldGroup").remove();
            });
    });
	</script>
    
    
</body>
</html>