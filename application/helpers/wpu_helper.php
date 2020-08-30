<?php 

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    
    }
}

function user() {
    $app =& get_instance();
    $session = $app->session->userdata();
    $user = $app->db->get_where('user', ['email' => $session['email']])->row();
    return $user;
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

if ( ! function_exists('company'))
{
    function company() {
        $app =& get_instance();
        $user = $app->db->get('company')->row();
        return $user;
    }
}



if(!function_exists("inbox")) {
    function inbox() {
        $app =& get_instance();
        $user = $app->db->query("SELECT id_surat_masuk FROM surat_masuk ORDER BY id_surat_masuk DESC LIMIT 0,1")->row();
            
        if(empty($user))
        {
            $data = "M01";
        }
        else
        {
            $id = substr($user->id_surat_masuk, 1);
            $id = $id+1;
            if($id < 10){
                $data = "M0" . $id;
            }
            else{
                $data = "M".$id;
            }
        }
        

        return $data;
    }    
}


if(!function_exists("outbox")) {
    function outbox() {
        $app =& get_instance();
        $user = $app->db->query("SELECT id_surat_keluar FROM surat_keluar ORDER BY id_surat_keluar DESC LIMIT 0,1")->row();
        
        if(empty($user))
        {
            $data = "K01";
        }
        else
        {
            $id = substr($user->id_surat_keluar, 1);
            $id = $id+1;
            if($id < 10){
                $data = "K0" . $id;
            }
            else{
                $data = "K".$id;
            }
        }

        return $data;
    }    
}

if(!function_exists("nextIn")) {
    function nextIn() {
        $app =& get_instance();
        $user = $app->db->query("SELECT kode_surat FROM surat_masuk ORDER BY kode_surat DESC LIMIT 0,1")->row();
        
        if(empty($user))
        {
            //$id = explode("/", $user->kode_surat);
            $data = 1;
        }
        else
        {
            $id = explode("/", $user->kode_surat);
            $data = intval($id[0])+1;
        }

        return $data;
    }    
}


if(!function_exists("nextOut")) {
    function nextOut() {
        $app =& get_instance();
        $user = $app->db->query("SELECT kode_surat FROM surat_keluar ORDER BY kode_surat DESC LIMIT 0,1")->row();
        if(!is_object($user))
        {
            //$id = explode("/", $user->kode_surat);
            $data = "001";
        }
        else
        {
            $id = explode("/", $user->kode_surat);
            $id = substr($id[0], 1);
            $id = $id+1;
            if($id < 10){
                $data = "00" . $id;
            }
            elseif($id < 100){
                $data = "0".$id;
            }
            else{
                $data = $id;
            }
        }

        return $data;
    }    
}

if (!function_exists('encode')) {
    function encode($string) {
        return encrypt_decrypt('encrypt', $string);
    }
}

if (!function_exists('decode')) {
    function decode($string) {
        return encrypt_decrypt('decrypt', $string);
    }
}

if (!function_exists('encrypt_decrypt')) {
    function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'eXnumberFramework';
        $secret_iv = 'Omeoo Media';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}

/*==-- Ajax redirect --==*/
if (!function_exists('ajaxRedirect')) {
    function ajaxRedirect($redirect = '', $timer = 10000) {
        if ($timer == 0) {
            return '<script>window.location.href="' . site_url($redirect) . '";</script>';
        } else {
            return '<script>setTimeout("window.location.href=\'' . site_url($redirect) . '\'",' . $timer . ');</script>';
        }
    }
}

if (!function_exists('date_indo')) {
    function date_indo($fulldate) {
        $date = substr($fulldate, 8, 2);
        $month = get_month(substr($fulldate, 5, 2));
        $year = substr($fulldate, 0, 4);
        return $date . ' ' . $month . ' ' . $year;
    }
}

if (!function_exists('date_modif')) {
    function date_modif($fulldate, $count, $category) {
        $date=date_create($fulldate);
        date_modify($date,"+$count $category");
        $result = date_format($date,"Y-m-d");
        return $result;
    }
}

if (!function_exists('date_simple')) {
    function date_simple($fulldate) {
        $date = substr($fulldate, 8, 2);
        $month = substr($fulldate, 5, 2);
        $year = substr($fulldate, 0, 4);
        return $date . '/' . $month . '/' . $year;
    }
}

if (!function_exists('date_short')) {
    function date_short($fulldate) {
        $date = substr($fulldate, 8, 2);
        $month = get_month3(substr($fulldate, 5, 2));
        $year = substr($fulldate, 0, 4);
        return $date . ' - ' . $month . ' - ' . $year;
    }
}

if (!function_exists('date_normal')) {
    function normal_date($fulldate) {
        $date = substr($fulldate, 8, 2);
        $month = get_month3(substr($fulldate, 5, 2));
        $year = substr($fulldate, 0, 4);
        return $date . '/' . $month . '/' . $year;
    }
}

if (!function_exists('date_time')) {
    function date_time($fulldate) {
        $date = substr($fulldate, 0, 2);
        $month = get_month2(substr($fulldate, 3, 3));
        $year = substr($fulldate, 7, 4);
        $time = substr($fulldate, 12, 5);
        return $year . '-' . $month . '-' . $date . ' ' . $time;
    }
}

if (!function_exists('date_full')) {
    function date_full($fulldate) {
        $date = substr($fulldate, 8, 2);
        $month = substr($fulldate, 5, 2);
        $year = substr($fulldate, 0, 4);
        $time = substr($fulldate, 11, 8);
        return $date . '/' . $month . '/' . $year . ' ' . $time;
    }
}

if (!function_exists('mysql_date')) {
    function mysql_date($fulldate) {
        $date = substr($fulldate, 0, 2);
        $month = get_month2(substr($fulldate, 3, 3));
        $year = substr($fulldate, 7, 4);
        return $year . '-' . $month . '-' . $date;
    }
}

//Format input date mm-dd-yyyy
if(!function_exists('mysql_date1')){
    function mysql_date1($fulldate) {
        $month = substr($fulldate, 0, 2);
        $date = substr($fulldate, 3, 2);
        $year = substr($fulldate, 6, 4);
        return $year . '-' . $month . '-' . $date;
    }
}


/*==-- Rupiah currency --==*/
if (!function_exists('rupiah')) {
    function rupiah($val) {
        $value = number_format($val, 0, ',', '.');
        return 'Rp. ' . $value;
    }
}

if (!function_exists('get_month')) {
    function get_month($month) {
        switch ($month) {
            case 1: return "Januari";
            case 2: return "Februari";
            case 3: return "Maret";
            case 4: return "April";
            case 5: return "Mei";
            case 6: return "Juni";
            case 7: return "Juli";
            case 8: return "Agustus";
            case 9: return "September";
            case 10: return "Oktober";
            case 11: return "November";
            case 12: return "Desember";
        }
    }
}

if (!function_exists('get_month2')) {
    function get_month2($month) {
        switch ($month) {
            case "Jan": return "01";
            case "Feb": return "02";
            case "Mar": return "03";
            case "Apr": return "04";
            case "May": return "05";
            case "Jun": return "06";
            case "Jul": return "07";
            case "Aug": return "08";
            case "Sep": return "09";
            case "Oct": return "10";
            case "Nov": return "11";
            case "Dec": return "12";
        }
    }
}

if (!function_exists('get_month3')) {
    function get_month3($month) {
        switch ($month) {
            case "01": return "Jan";
            case "02": return "Feb";
            case "03": return "Mar";
            case "04": return "Apr";
            case "05": return "May";
            case "06": return "Jun";
            case "07": return "Jul";
            case "08": return "Aug";
            case "09": return "Sep";
            case "10": return "Oct";
            case "11": return "Nov";
            case "12": return "Dec";
        }
    }
}

if (!function_exists('get_month4')) {
    function get_month4($month) {
        switch ($month) {
            case "01": return "I";
            case "02": return "II";
            case "03": return "III";
            case "04": return "IV";
            case "05": return "V";
            case "06": return "VI";
            case "07": return "VII";
            case "08": return "VIII";
            case "09": return "IX";
            case "10": return "X";
            case "11": return "XI";
            case "12": return "XII";
        }
    }
}

if (!function_exists('get_month5')) {
    function get_month5($month) {
        switch ($month) {
            case "01": return "Januari";
            case "02": return "Februari";
            case "03": return "Maret";
            case "04": return "April";
            case "05": return "Mei";
            case "06": return "Juni";
            case "07": return "Juli";
            case "08": return "Agustus";
            case "09": return "September";
            case "10": return "Oktober";
            case "11": return "November";
            case "12": return "Desember";
        }
    }
}
if (!function_exists('dropdown_month')) {
    function dropdown_month($month = '') {
        $month = ($month == '') ? date('m') : $month;
        $options = '';
        for($a=1; $a<=12; $a++) {
            $key = ($a<10) ? '0'.$a : $a;
            $selected = ($key==$month) ? 'selected' : '';
            $options .= '<option value="'.$key.'" '.$selected.'>'.get_month5($key).'</option>';
        }
        return $options;
    }
}

if (!function_exists('dropdown_year')) {
    function dropdown_year($year = '') {
        $options = '';
        for($a=0; $a<5; $a++) {
            $year = ($year == '') ? date('Y') : $year;
            $years = intval(date('Y')) - $a;
            $selected = ($years == $year) ? 'selected' : '';
            $options .= '<option value="'.$years.'" '.$selected.'>'.$years.'</option>';
        }
        return $options;
    }
}

if(!function_exists('modalkonfirmasi')){
    function modalkonfirmasi($url, $id, $text = ''){



        if(empty($text)) {
            $text = "Apakah anda yakin akan menghapus data ";
        }
        else{
            $text;
        }

        $action = $url. '/'. $id;
        $modal = '
            <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalTitle">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="'. $action.'" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    '. $text  .'
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
        return $modal;
    }
}
?>