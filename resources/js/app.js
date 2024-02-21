import './bootstrap';
import '/node_modules/admin-lte/dist/css/adminlte.min.css';
import '/node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css';
import '/node_modules/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css';
import '/node_modules/admin-lte/plugins/select2/css/select2.min.css';
import '/node_modules/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css';

// import '/node_modules/admin-lte/dist/js/adminlte.min.js'
import '/node_modules/admin-lte/plugins/jquery/jquery.min.js';
// import '/node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js'
import '/node_modules/admin-lte/plugins/select2/js/select2.full.min.js';
import Swal from 'sweetalert2';

window.Swal = Swal;

$(document).ready(function() {
    // $('.select2').select2();
    $('.select2').select2({
        theme: 'bootstrap4'
    })

});
