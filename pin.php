 <div class="col">
          <form action="" method="post" >
          <h5 style="text-align: center;">Ubah PIN ADMIN</h5>
          <br>
          <div class="form-group" style="margin-left: 80px;">

            <input type="password" class="form-control" id="pin" name="pin" placeholder="PIN lama" maxlength="6" style="width: 300px;">
          <br>
            <?php if(!isset($show)): ?>
              <div style="margin-left: 180px;">
            <button type="submit" class="btn btn-primary" name="ok" >Ubah PIN</button>
            <?php endif; ?>

          <?php if (isset($show)): ?>
            <input type="password" class="form-control" id="kpin" name="kpin" placeholder="PIN baru" maxlength="6" style="width: 300px;">
            <br>
            <input type="password" class="form-control" id="kpin2" name="kpin2" placeholder="Konfirmasi PIN baru" maxlength="6" style="width: 300px;">
          </div>

             
          <div style="margin-left: 180px;">
            <button type="submit" class="btn btn-primary" name="cpin" >Ubah PIN</button>
                    <?php endif; ?>

          <?php if(isset($info)) :?>
              <p style="size: 15px; color: red;"> PIN BERHASIL DIGANTI </p>
          <?php endif; ?>
          
          </div>
        </form>
              
            </div> 

        </div>