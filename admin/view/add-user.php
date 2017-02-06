    <div class="main-content">
      <h3 class="name-page">Add user</h3>
      <div class="form col-md-7">
          <form action method="post">                    
             <div class="form-group">
                 <label>Username</label>
                 <input class="form-control" name="name">
             </div>
             <div class="form-group">
                 <label>Password</label>
                 <input type="Password" class="form-control" name="pass">
             </div>
             <div class="form-group">
                 <label>RePassword</label>
                 <input type="Password" class="form-control" name="Repass">
             </div>
             <div class="form-group">
                 <label>Email</label>
                 <input type="Email" class="form-control" name="email">
             </div>
             <div class="form-group">
                 <label>Level</label>
                 <select class="form-control" name="level">
                     <option value="1">Admin</option>
                     <option value="2">Mod</option>
                 </select>
             </div>
             <div class="form-group">
                 <button class="btn btn-primary"  name='submit'>ok</button>
             </div>
          </form>
      </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script type="text/javascript" src="public/bootstrap3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/js/admin.js"></script>
<script src="https://use.fontawesome.com/8da12d219b.js"></script>
</body>
</html>