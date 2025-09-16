<?php $this->load->view('admin/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Home Cover</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <!-- Flash Messages -->
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

            <div class="row">
                <!-- Cover Settings Form -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-image"></i> Cover Settings
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/home_cover/update') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                                
                                <!-- Cover Image Upload -->
                                <div class="form-group">
                                    <label for="cover_image">Cover Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cover_image" name="cover_image" accept="image/*">
                                            <label class="custom-file-label" for="cover_image">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">
                                        Current image: <strong><?= $cover->cover_image ?></strong><br>
                                        Supported formats: JPG, PNG, GIF, WebP (Max: 2MB)
                                    </small>
                                </div>

                                <!-- Current Image Preview -->
                                <?php if ($cover && $cover->cover_image): ?>
                                <div class="form-group">
                                    <label>Current Cover Image:</label>
                                    <div class="text-center">
                                        <img src="<?= (strpos($cover->cover_image, 'home_cover_') === 0) ? base_url('uploads/' . $cover->cover_image) : base_url('assets/' . $cover->cover_image) ?>" 
                                             alt="Current Cover" 
                                             class="img-fluid rounded" 
                                             style="max-height: 200px; max-width: 100%;">
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Animated Text 1 -->
                                <div class="form-group">
                                    <label for="animated_text_1">Animated Text #1</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="animated_text_1" 
                                           name="animated_text_1" 
                                           value="<?= set_value('animated_text_1', $cover->animated_text_1) ?>"
                                           maxlength="100"
                                           placeholder="Enter first animated text">
                                    <small class="form-text text-muted">Maximum 100 characters</small>
                                </div>

                                <!-- Animated Text 2 -->
                                <div class="form-group">
                                    <label for="animated_text_2">Animated Text #2</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="animated_text_2" 
                                           name="animated_text_2" 
                                           value="<?= set_value('animated_text_2', $cover->animated_text_2) ?>"
                                           maxlength="100"
                                           placeholder="Enter second animated text">
                                    <small class="form-text text-muted">Maximum 100 characters</small>
                                </div>

                                <!-- Active Status -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" 
                                               class="form-check-input" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1"
                                               <?= $cover->is_active ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="is_active">
                                            Active (Show on homepage)
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Cover Settings
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Actions & Preview -->
                <div class="col-md-4">
                    <!-- Quick Actions -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bolt"></i> Quick Actions
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-warning" onclick="toggleCoverStatus()">
                                    <i class="fa fa-toggle-<?= $cover->is_active ? 'on' : 'off' ?>"></i> 
                                    <?= $cover->is_active ? 'Deactivate' : 'Activate' ?> Cover
                                </button>
                                
                                <button type="button" class="btn btn-secondary" onclick="resetToDefault()">
                                    <i class="fas fa-undo"></i> Reset to Default
                                </button>
                                
                                <a href="<?= base_url() ?>" class="btn btn-info" target="_blank">
                                    <i class="fas fa-external-link-alt"></i> View Homepage
                                </a>
                                
                                <a href="<?= base_url('admin/home_cover/clear_messages') ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i> Clear Messages
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Cover Statistics -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-bar"></i> Statistics
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info">
                                            <i class="fas fa-image"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Covers</span>
                                            <span class="info-box-number"><?= $stats['total_covers'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-<?= $cover->is_active ? 'success' : 'danger' ?>">
                                            <i class="fas fa-<?= $cover->is_active ? 'check' : 'times' ?>"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Status</span>
                                            <span class="info-box-number"><?= $cover->is_active ? 'Active' : 'Inactive' ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if ($stats['last_updated']): ?>
                            <div class="mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-clock"></i> 
                                    Last updated: <?= date('M j, Y g:i A', strtotime($stats['last_updated'])) ?>
                                </small>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Live Preview -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-eye"></i> Live Preview
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="cover-preview" style="position: relative; height: 200px; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?= (strpos($cover->cover_image, 'home_cover_') === 0) ? base_url('uploads/' . $cover->cover_image) : base_url('assets/' . $cover->cover_image) ?>'); background-size: cover; background-position: center; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-direction: column; color: white; text-align: center;">
                                <h3 id="preview-text-1" style="margin: 0; font-size: 1.5rem; font-weight: bold;"><?= $cover->animated_text_1 ?></h3>
                                <p id="preview-text-2" style="margin: 10px 0 0 0; font-size: 1rem;"><?= $cover->animated_text_2 ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript for dynamic preview and actions -->
<script>
// Live preview updates
document.getElementById('animated_text_1').addEventListener('input', function() {
    document.getElementById('preview-text-1').textContent = this.value;
});

document.getElementById('animated_text_2').addEventListener('input', function() {
    document.getElementById('preview-text-2').textContent = this.value;
});

// File input label update
document.getElementById('cover_image').addEventListener('change', function() {
    const fileName = this.files[0] ? this.files[0].name : 'Choose file';
    this.nextElementSibling.textContent = fileName;
});

// Toggle cover status
function toggleCoverStatus() {
    if (confirm('Are you sure you want to toggle the cover status?')) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?= base_url('admin/home_cover/toggle_status') ?>';
        
        var csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '<?= $this->security->get_csrf_token_name() ?>';
        csrfToken.value = '<?= $this->security->get_csrf_hash() ?>';
        form.appendChild(csrfToken);
        
        document.body.appendChild(form);
        form.submit();
    }
}

// Reset to default
function resetToDefault() {
    if (confirm('Are you sure you want to reset to default settings? This will remove any custom image and text.')) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?= base_url('admin/home_cover/reset_default') ?>';
        
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
