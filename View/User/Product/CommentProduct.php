<?php
include_once "../../../Models/pdo.php";
include "../../../Models/Comment.php";
include "../../../Models/User.php";
$san_pham_id = $_REQUEST['san_pham_id'];

$ListComment = GetAllCommentByID("", $san_pham_id);
?>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        height: fit-content;
    }

    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: rgb(100 116 139 / 0.2);
        border-radius: 100vw;
        margin-block: 0.5em;
    }

    ::-webkit-scrollbar-thumb {
        background: rgb(100 116 139 / 1);
        border-radius: 100vw;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgb(100 116 139 / 0.5);
    }

    .user {
        display: flex;
        align-items: center;
        column-gap: 10px;
        margin-bottom: 5px;
    }

    .avatar img {
        width: 40px;
        height: 40px;
        border-radius: 20px;
        border: 1px solid #ccc;
    }

    .content {
        padding-left: 50px;
        margin-bottom: 20px;
    }

    #time {
        color: #888;
        font-style: italic;
    }
</style>

<div class="boxComment">
    <?php
    if (is_array($ListComment) && count($ListComment) > 0) {
        foreach ($ListComment as $Comment) {
            extract($Comment);
            $User = GetOneUser($tai_khoan_id);
            if (isset($User) && is_array($User)) {
                extract($User);
                $hinhPath = "../../../Upload/User/" . $hinh;
                if (!is_file($hinhPath)) {
                    if ($gioi_tinh == 1) {
                        $hinhPath = "../../../Img/nam.jpg";
                    } else {
                        $hinhPath = "../../../Img/nu.jpg";
                    }
                }
    ?>
                <div class="Comment">
                    <div class="user">
                        <div class="avatar">
                            <img src="<?= $hinhPath ?>">
                        </div>
                        <div class="user_name_and_time">
                            <h3><?= $ho_va_ten ?></h3>
                            <span id="time"><?= $ngay_binh_luan ?></span>
                        </div>
                    </div>
                    <div class="content"><?= $noi_dung ?></div>
                </div>
        <?php }
        }
    } else { ?>
        <h2>Không có bình luận nào</h2>
    <?php } ?>
</div>