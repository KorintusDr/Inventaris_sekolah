<div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-user"></i> Edit Profil Anda</h3>
                                </div>
                                <div class="card-body">
                                    <?= form_open_multipart('profile/update'); ?>
                                        <input type="hidden" name="old_gambar" value="<?= $user->gambar; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="nama_lengkap">Nama Lengkap:</label>
                                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap', $user->nama_lengkap); ?>" required oninput="autoGenerateUsername()">
                                                    <?= form_error('nama_lengkap'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username', $user->username); ?>" required>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-secondary" onclick="generateUsername()">Generate Username</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="password">Password:</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password jika ingin mengganti">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-eye" id="togglePassword" onclick="togglePasswordVisibility('password')" style="cursor: pointer;"></i>
                                                        </span>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-secondary" onclick="generatePassword()">Generate Password</button>
                                                    </div>
                                                </div>
                                                <?= form_error('password'); ?>
                                            </div>

                                                <div class="form-group">
                                                    <label for="gambar">Gambar:</label>
                                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                                    <?php if ($user->gambar): ?>
                                                        <img src="<?= base_url('uploads/' . $user->gambar); ?>" alt="Profile Image" class="img-thumbnail" width="100">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-save"></i> Simpan
                                                    </button>
                                                    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">
                                                        <i class="fas fa-times"></i> Batal
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?= form_close(); ?>
                                    <div class="info-note">
                                        <p><strong>Catatan:</strong></p>
                                        <p>1. Gunakan tombol <b>"Generate Username"</b> untuk membuat username yang kuat secara otomatis berdasarkan nama lengkap Anda.</p>
                                        <p>2. Gunakan tombol <b>"Generate Password</b>" untuk membuat password yang kuat secara otomatis.</p>
                                        <p>3. Anda dapat melihat password yang sedang Anda ketik dengan mengklik ikon mata di samping field password.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</div>

<script>
        function autoGenerateUsername() {
            var name = $('#nama_lengkap').val();
            if (name.length > 0) {
                $.get('<?= base_url('profile/generate_username') ?>', { name: name }, function(data) {
                    $('#username').val(data);
                });
            }
        }

        function generateUsername() {
            var name = $('#nama_lengkap').val();
            if (name.length > 0) {
                $.get('<?= base_url('profile/generate_username') ?>', { name: name }, function(data) {
                    $('#username').val(data);
                });
            }
        }

        function generatePassword() {
            $.get('<?= base_url('profile/generate_password') ?>', function(data) {
                $('#password').val(data);
                $('#password_confirm').val(data); 
            });
        }

        function togglePasswordVisibility(fieldId) {
            var passwordField = $('#' + fieldId);
            var passwordFieldType = passwordField.attr('type');
            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                $('.show-password').html('<i class="fas fa-eye-slash"></i>');
            } else {
                passwordField.attr('type', 'password');
                $('.show-password').html('<i class="fas fa-eye"></i>');
            }
        }
</script>

