<?php

/**
 * Created by PhpStorm.
 * User: infinite
 * Date: 3/26/17
 * Time: 10:34 AM
 */
    require('classes/Modal.class.php');

    class GalleryAccess {
        public static function loadImageData() {
            $modal = new Modal();
            $sql = $modal->generate_sql('get_all_imgs');
            $images = $modal->get_db_data($sql, null);
            if (count($images) > 0) {
                return json_encode($images);
            } else
                return json_encode("EMPTY");
        }

        public static function loadUserImages($userID) {
            $modal = new Modal();
            $sql = $modal->generate_sql('get_user_imgs');
            $queryParams = array($userID);
            $images = $modal->get_db_data($sql, $queryParams);
            if (count($images) > 0) {
                return json_encode($images);
            } else {
                return json_encode('FALSE');
    }
        }

        public static function uploadUserImage($userID, $image) {
            $modal = new Modal();
            $sql = $modal->generate_sql('new_img');
            $queryParams = array($image, $userID);
            $images = $modal->change_db_data($sql, $queryParams);
            if (count($images) > 0) {
                return json_encode($images);
            } else {
                return json_encode('FALSE');
            }
        }
    }