<h2 align="center">Customer Available</h2>

<div class="container"> 

    <div class="table-responsive" >
        <table id="viewcustomer" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Customer Address</th>
                    <th>Customer Phone</th>
                    <th>Stop Phone</th>
                    <th>NIC</th>
                    <th>Type</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($getcustomer as $rec) { ?>
                    <tr>

                        <td><?php echo $rec->custId; ?></td>
                        <td><?php echo $rec->nm1; ?>&nbsp;<?php echo $rec->nm2; ?></td>
                        <td><?php echo $rec->adrs; ?></td>
                        <td><?php echo $rec->phnM; ?></td>
                        <td><?php echo $rec->phnS; ?></td>
                        <td><?php echo $rec->nic; ?></td>
                        <td><?php echo $rec->custGrpCd; ?></td>

                        <td>
                           
                            <a href="#edit<?php// echo $Id; ?>" class="btn btn-warning" data-toggle="modal" data-target="#viewcustomer">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Edit
                            </a>
                        </td>  
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

        
        <div id="edit<?php //echo $Id; ?>"class="modal fade" role="dialog" id="viewcustomer">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Customer</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="form-group modal-body">
                        <form method="post" action="<?php echo base_url() ?>invoiceC/addCustomer">
                            <div class="modal-body form-group">
                                <input type="text" class="form-control" name="custId" value="<?php// echo $Id ?>" placeholder="Id"/><br/><br/>
                                <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>" placeholder="First Name"/><br/><br/>
                                       
                                <input type="text" class="form-control" name="lname"  value="<?php echo $lname ?>" placeholder="Last Name"/><br/><br/>
                                <input type="text" class="form-control" name="nic"  value="<?php echo $nic ?>" placeholder="NIC Number"/><br/><br/>
                                <input type="text" class="form-control" name="adrs"  value="<?php echo $adrs ?>" placeholder="Address"/><br/><br/>
                               <!-- <input type="text" class="form-control" name="mobile"  value="<?php echo $mobile ?>" placeholder="Mobile"/><br/><br/>
                                <input type="text" class="form-control" name="home"  value="<?php echo $home ?>" placeholder="Home"/><br/><br/> -->
                                <input type="text" class="form-control" name="shop"  value="<?php echo $shop ?>" placeholder="shop"/><br/><br/>
                                <select class="form-control" name="custgrp_select">
                                    <option value="">Select Group</option>
                                    <option value="1">Retail</option>
                                    <option value="2">Wholesale</option>
                                </select><br/><br/>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="addcustomer">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div></div></div></div>
