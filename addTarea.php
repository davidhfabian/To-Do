<section class="form-add">
        <form action="index.php" method="POST">
            <div>
                <label for="tarea">Nueva Tarea</label><br>
                <input type="text" name="tarea" autocomplete="off">
            </div>
            <div>
                <label for="descripcion">Descripcion</label><br>
                <textarea name="descripcion" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="button">
                <button type="submit"><i class="fas fa-plus"></i>Agregar</button>
                <span class="error"><?=$_SESSION['error'] ?? ''?></span>
                <span class="correct"><?=$_SESSION['correct'] ?? ''?></span>
            </div>
            <?php
           
             ?>

        </form>
 </section>