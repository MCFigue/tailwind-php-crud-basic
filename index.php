<?php  include("db.php")?>
<?php include("includes/header.php") ?>

<div class="mx-auto ">
    <div class="grid grid- gap-2 cols-2 sm:grid-cols-2  m-28">

        <div class="mx-auto">

             <?php if (isset($_SESSION['message'])) { ?>
                <div class="bg-green-300 text-green-700 py-2 px-10 rounded-md -<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?=$_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();} ?>
            
            <div class="  items-center	">

                <form action="save_task.php" method="POST">

                    <div class=" grid grid-col-2">

                        <div class="col-start-3 gap-2 ">
                                <div class="  p-2  items-center mt-5 ">
                                <input type="text" name="title" class="w-80  border-2 border-gray-300 rounded-md py-2 px-7 hover:shadow-lg shadow-gray-500/50" placeholder="Nombre de la tarea" autofocus>
                                
                            </div>

                            <div class=" p-2  ">
                                <textarea name="description"  rows="2" class="w-80 border-2 border-gray-300 rounded-md py-2 px-7 hover:shadow-lg shadow-gray-500/50" placeholder="Descripción de la tarea"></textarea>
                            </div>
                            
                            

                            <div class=" gap-2 p-2 ">

                            <input type="submit" name="save_task" class="w-80 bg-green-500 text-white px-10 py-2 rounded-md cursor-pointer" value="Save Task">   
                                    
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="border-collapse border border-slate-500">
                    <thead>
                        <tr>
                            <th class="border border-slate-500 px-4 py-2">Titulo</th>
                            <th class="border border-slate-500 px-4 py-2">Descripción</th>
                            <th class="border border-slate-500 px-4 py-2">Fecha</th>
                            <th class="border border-slate-500 px-6 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                          $query = "SELECT * FROM task";
                          $result_tasks = mysqli_query($sconn, $query);    

                             while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                            <tr>
                                    <td class="border border-slate-300 px-4 py-1"><?php echo $row['title']; ?></td>
                                    <td class="border border-slate-300 px-4 py-1"><?php echo $row['description']; ?></td>
                                    <td class="border border-slate-300 px-4 py-1"><?php echo $row['created_at']; ?></td>
                                    <td class="border border-slate-300 px-4 py-1 ">
                                        <a href="edit.php?id=<?php echo $row['Id']?>" class="bg-gray-400 p-2 text-white rounded-lg">
                                            <i class="fas fa-marker "></i>
                                        </a>
                                        <a href="delete_task.php?id=<?php echo $row['Id']?>" class="bg-red-400 py-2 px-3 ml-2 text-white rounded-lg">
                                             <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                            </tr>
                        <?php }?>

                    </tbody>
                </table>
        </div>


    </div>

                                
</div>

<?php include("includes/footer.php") ?>