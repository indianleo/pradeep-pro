<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
      <link rel="stylesheet" href="main.css" type="text/css"/>
      <style>

      </style>
   </head>
   <body>
        <?php 
            $id = $_REQUEST['client_id'];
            $con = mysqli_connect("localhost","root","","ary");
            $res = mysqli_query($con,"select * from demo where id='$id'");
            $ans = mysqli_fetch_assoc($res);
        ?>
        <a href="records.php" class="btn btn-danger">Back</a>
        <div class="container">
            <div class="row">
              <form action="editor.php" method="post">
                <input type="hidden" name="action" value="master_form"/>
                <div class=" col-sm-10 demo_form col-sm-offset-1">
                    <div class="row fields form-group">
                        <label for="client_id">Client ID</label>
                        <input type="text" value="<?php echo $ans['id'] ?>" class="form-control" name="client_id" id="client_id" required />
                    </div>
                    <div class="row fields form-group">
                        <label for="mon">Month</label>
                        <input type="text" value="<?php echo $ans['mon'] ?>" class="form-control" name="mon" id="mon" required />
                    </div>
                    <div class="row fields form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" value="<?php echo $ans['date'] ?>" name="date" id="date" required/>
                    </div>
                    <div class="row fields form-group">
                        <label for="project">Project Name</label>
                        <input type="text" value="<?php echo $ans['project'] ?>" name="project" class="form-control" id="project" required />
                    </div>
                    <div class="row fields form-group">
                        <label for="sponsor">Sponsor Name</label>
                        <input type="text" name="sponsor" value="<?php echo $ans['sponsor'] ?>" class="form-control" id="sponsor" required />
                    </div>
                    <div class="row fields form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" name="client_name" value="<?php echo $ans['client_name'] ?>" class="form-control" id="client_name" placeholder="Client Name" required/>
                    </div>
                    <div class="row fields form-group">
                        <label for="resi_add">Residental Address</label>
                        <input type="text" name="resi_add" value="<?php echo $ans['resi_add'] ?>" class="form-control" id="resi_add" placeholder="Residental Address" />
                    </div>
                    <div class="row fields form-group">
                        <label for="contact_no">Contact No.</label>
                        <input type="number" name="contact_no" value="<?php echo $ans['contact_no'] ?>" class="form-control" id="contact_no" placeholder="Contact No." />
                    </div>
                    <div class="row fields form-group">
                        <label for="nomini">Nomini</label>
                        <input type="text" name="nomini" value="<?php echo $ans['nomini'] ?>" class="form-control" id="nomini" placeholder="Nomini" />
                    </div>
                    <div class="row fields form-group">
                        <label for="plot_no">Plot No.</label>
                        <input type="text" name="plot_no" value="<?php echo $ans['plot_no'] ?>" class="form-control" id="plot_no" placeholder="Plot NO." />
                    </div>
                    <div class="row fields form-group">
                        <label for="cash">Cash</label>
                        <input type="number" name="cash" value="<?php echo $ans['cash'] ?>" class="form-control" id="cash" placeholder="Cash" required/>
                    </div>
                    <div class="row fields form-group">
                        <label for="cheque">Cheque</label>
                        <input type="number" name="cheque" value="<?php echo $ans['cheque'] ?>" class="form-control" id="cheque" placeholder="Cheque" required/>
                    </div>
                    <div class="row fields form-group">
                        <label for="bank_name">Bank Name</label>
                        <input type="text" name="bank_name" value="<?php echo $ans['bank_name'] ?>" class="form-control" id="bank_name" />
                    </div>
                    <div class="row fields form-group">
                        <label for="agreement_date">Agreement Date</label>
                        <input type="date" name="agreement_date" value="<?php echo $ans['agreement_date'] ?>" class="form-control" id="agreement_date" placeholder="Agreement Date" />
                    </div>
                    <div class="row fields form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" value="<?php echo $ans['status'] ?>" class="form-control" id="status" required/>
                    </div>
                    <div class="row fields form-group">
                        <input type="submit" name="submit_btn" class="btn btn-info" id="form_submit_btn" value="Submit"/>
                        <input type="reset" name="clear_btn" class="btn btn-warning" id="form_clear_btn" value="Clear" />
                    </div>
                </div>
              </form>
            </div>
        </div>
</body>
</html>
