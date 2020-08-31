<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('submenu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <form action="" method="post" class="submenu">
            <div class="card">
                <div class="card-header font-weight-bold text-primary">
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" 
                        placeholder="Submenu title" value="<?=$submenu->title; ?>">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            
                            <?php foreach ($menu as $m) : ?>
                            <?php $selected = $m['id'] == $submenu->menu_id ? "selected" : ""; ?>
                                <option value="<?= $m['id']; ?>" <?= $selected; ?>><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" 
                        value="<?= $submenu->url; ?>" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" 
                        value="<?= $submenu->icon; ?>" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?=base_url('menu/submenu'); ?>" class="btn btn-default btn-block btn-sm"> Back</a>    
                        </div>
                        <div class="col-lg-8">
                            <button class="btn btn-primary btn-sm btn-block">
                                <i class="fas fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->