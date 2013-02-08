<?php
class RebuildFilter extends MTPlugin {

    var $registry = array(
        'name' => 'RebuildFilter',
        'id'   => 'RebuildFilter',
        'author_name' => 'Alfasado Inc.',
        'author_link' => 'http://alfasado.net/',
        'version' => '0.1',
        'callbacks' => array(
            'pre_build_page' => 'pre_build_page'
        ),
        'config_settings' => array(
            'CategoryFilterBasename' => array( 'default' => 'categoryfilter' ),
            'PageFilterBasename' => array( 'default' => 'pagefilter' ),
            'IndividualFilterBasename' => array( 'default' => 'entryfilter' ),
            'FolderFilterBasename' => array( 'default' => 'folderfilter' ),
        ),
    );

    function pre_build_page ( $mt, $ctx, &$args ) {
        $app = $ctx->stash( 'bootstrapper' );
        $fileinfo = $app->stash( 'fileinfo' );
        $at = $fileinfo->archive_type;
        if ( ( $at == 'Individual' ) || ( $at == 'Category' ) || ( $at == 'Page' ) || ( $at == 'Folder' ) ) {
            $basename = $app->config( $at . 'FilterBasename' );
            if ( ( $at == 'Individual' ) || ( $at == 'Page' ) ) {
                $obj = $ctx->stash( 'entry' );
            } else {
                $obj = $ctx->stash( 'category' );
            }
            if ( $obj->$basename ) {
                $ctx->error( $app->translate( 'Page not found - [_1]', $app->stash( 'request' ) ) );
            }
        }
    }

}

?>