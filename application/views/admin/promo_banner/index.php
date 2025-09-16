<?php $this->load->view('admin/header'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Promotional Banner Management</h4>
                        <p class="card-subtitle">Manage the promotional banner that appears at the top of your website</p>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('error') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('admin/promo_banner/update') ?>" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="banner_text">Banner Text <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="banner_text" name="banner_text" rows="3" required><?= isset($banner) ? $banner->banner_text : '' ?></textarea>
                                        <small class="form-text text-muted">Enter the promotional message to display on the banner</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="is_active">Banner Status <span class="text-danger">*</span></label>
                                        <select class="form-control" id="is_active" name="is_active" required>
                                            <option value="1" <?= (isset($banner) && $banner->is_active == 1) ? 'selected' : '' ?>>Active (Show Banner)</option>
                                            <option value="0" <?= (isset($banner) && $banner->is_active == 0) ? 'selected' : '' ?>>Inactive (Hide Banner)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="background_color">Background Color <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="color" class="form-control" id="background_color" name="background_color" 
                                                   value="<?= isset($banner) ? $banner->background_color : '#8cc63f' ?>" required>
                                            <input type="text" class="form-control" id="background_color_text" 
                                                   value="<?= isset($banner) ? $banner->background_color : '#8cc63f' ?>" readonly>
                                        </div>
                                        <small class="form-text text-muted">Choose the background color for the banner</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="text_color">Text Color <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="color" class="form-control" id="text_color" name="text_color" 
                                                   value="<?= isset($banner) ? $banner->text_color : '#ffffff' ?>" required>
                                            <input type="text" class="form-control" id="text_color_text" 
                                                   value="<?= isset($banner) ? $banner->text_color : '#ffffff' ?>" readonly>
                                        </div>
                                        <small class="form-text text-muted">Choose the text color for the banner</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Preview</label>
                                        <div class="preview-banner" id="preview_banner" 
                                             style="background-color: <?= isset($banner) ? $banner->background_color : '#8cc63f' ?>; 
                                                    color: <?= isset($banner) ? $banner->text_color : '#ffffff' ?>; 
                                                    padding: 10px; border-radius: 5px; margin-top: 10px;">
                                            <p class="mb-0 text-center"><?= isset($banner) ? $banner->banner_text : 'Take $100 off a training package! Limited time offer.' ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update Banner
                                </button>
                                <button type="button" class="btn btn-warning" onclick="toggleBannerStatus()">
                                    <i class="fa fa-toggle-on"></i> Toggle Status
                                </button>
                                <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i> Back to Dashboard
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Update text inputs when color picker changes
    $('#background_color').on('change', function() {
        $('#background_color_text').val($(this).val());
        updatePreview();
    });
    
    $('#text_color').on('change', function() {
        $('#text_color_text').val($(this).val());
        updatePreview();
    });
    
    // Update preview when text changes
    $('#banner_text').on('input', function() {
        updatePreview();
    });
    
    function updatePreview() {
        var bgColor = $('#background_color').val();
        var textColor = $('#text_color').val();
        var bannerText = $('#banner_text').val() || 'Enter your banner text here...';
        
        $('#preview_banner').css({
            'background-color': bgColor,
            'color': textColor
        }).find('p').text(bannerText);
    }
});

function toggleBannerStatus() {
    if (confirm('Are you sure you want to toggle the banner status?')) {
        // Create a form to submit the toggle request with CSRF protection
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?= base_url('admin/promo_banner/toggle_status') ?>';
        
        // Add CSRF token
        var csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '<?= $this->security->get_csrf_token_name() ?>';
        csrfToken.value = '<?= $this->security->get_csrf_hash() ?>';
        form.appendChild(csrfToken);
        
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

<?php $this->load->view('admin/footer'); ?>
