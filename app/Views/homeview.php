<?php $this->extend('layouts/base.php'); ?>

<?php $this->section("pageContent"); ?>

<div class="form-container">
    <?= form_open(getAction($form)) ?>
    <div class="row">
        <?php if (isset($session)):
            if ($session->getFlashData('success')):
                ?>

                <div class="alert alert-success">
                    <?= $session->getFlashData('success'); ?>
                </div>
            <?php elseif ($session->getFlashData('error')): ?>
                <div class="alert alert-error">
                    <?= $session->getFlashData('error'); ?>
                </div>
            <?php endif; endif; ?>

        <input type="hidden" name="id" value="<?=getFormValue('id', $form)?>" >
        <div class="col-6">
            <div class="form-group">
                <label>Name </label>
                <input class="form-control" type="text" name="name" id="name" value="<?=getFormValue('name', $form)?>"/>
            </div>
            <div class="form-group">
                <label>Email </label>
                <input class="form-control" type="text" name="email" id="email" value="<?=getFormValue('email', $form)?>" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>City </label>
                <input class="form-control" type="text" name="city" id="city" value="<?=getFormValue('city', $form)?>" />
            </div>
            <div class="form-group">
                <label>Designation </label>
                <input class="form-control" type="text" name="designation" id="designation" value="<?=getFormValue('designation', $form)?>" />
            </div>
        </div>
    </div>
    <button type="submit" style="margin-top: 1rem;" class="btn btn-primary">Save</button>
    <?php form_close() ?>
</div>

<div class="table-container">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empList as $emp): ?>
                <tr>
                    <td>
                        <?= $emp['name']; ?>
                    </td>
                    <td>
                        <?= $emp['email']; ?>
                    </td>
                    <td>
                        <?= $emp['city']; ?>
                    </td>
                    <td>
                        <?= $emp['designation']; ?>
                    </td>
                    <td>
                        <button class="btn btn-success">
                            <a href="<?= base_url() . 'home/edit/' . $emp['id'] ?>">Edit</a>
                        </button>
                        <button class="btn btn-danger">
                            <a href="<?= base_url() . 'home/delete/' . $emp['id'] ?>">Detele</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php $this->endSection() ?>