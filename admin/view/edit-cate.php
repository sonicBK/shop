    <div class="main-content">
      <h3 class="name-page">Sá»­a danh má»¥c</h3>
      <div class="form col-md-7">
          <form action method="post">                    
             <div class="form-group">
                 <label>TÃªn danh má»¥c</label>
                 <input class="form-control" name="txtName" value="<?=$cate['name']?>">
             </div>
             <div class="form-group">
                 <label>Danh má»¥c cha</label>
                 <select class="form-control" name='parent_id'>
                    <option value="0">--khÃ´ng chá»�n--</option>
                    <?php
                      foreach ($listCate as $value) {
                        if ($value['id'] != $cate['id']) {
                    ?>
                    <option value="<?=$value['id']?>" <?php if($cate['parent_id'] == $value['id']) echo "selected"?>><?=$value['name']?></option>        
                    <?php
                        }
                      }
                    ?>
                 </select>
             </div><div class="form-group">
                 <label>MÃ´ táº£</label>
                 <textarea class="form-control" name="txtDesc"><?=$cate['desc']?></textarea>
             </div>
             <div class="form-group">
                 <button class="btn btn-primary"  name='submit'>Xong</button>
                 <button class="btn btn-default"  name='cancel'>Há»§y</button>
             </div>
          </form>
      </div>
    </div>
</div>
