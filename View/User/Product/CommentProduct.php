<?php
include_once "../../../Models/pdo.php";
include "../../../Models/Comment.php";
include "../../../Models/User.php";
$san_pham_id = $_REQUEST['san_pham_id'];

$ListComment = GetAllCommentByID("", $san_pham_id);


?>

<div>
    <?php
    if (is_array($ListComment) && count($ListComment) > 0) {
        foreach ($ListComment as $Comment) {
            extract($Comment);
            $User = GetOneUser($tai_khoan_id);
            if (isset($User) && is_array($User)) {
                echo /*html*/ '
                <span>' . $User['ho_va_ten'] . '</span>
                <span>' . $noi_dung . '</span>
                ';
            }
        }
    } else {
        echo '<h1>Không có bình luận nào</h1>';
    }

    ?>
</div>