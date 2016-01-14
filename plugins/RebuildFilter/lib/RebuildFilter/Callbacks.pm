package RebuildFilter::Callbacks;

use strict;
use warnings;

sub _build_file_filter {
    my ( $cb, %args ) = @_;
    my $at  = $args{ ArchiveType };
    if ( ( $at eq 'Individual' ) || ( $at eq 'Category' ) ||
        ( $at eq 'Page' ) || ( $at eq 'Folder' ) ) {
        my $basename = MT->config( $at . 'FilterBasename' );
        return 1 unless $basename;
        $basename = 'field.' . $basename;
        my $obj;
        if ( ( $at eq 'Category' ) || ( $at eq 'Folder' ) ) {
            $obj = $args{ Category };
        } else {
            $obj = $args{ Entry };
        }
        if ( $obj->has_column( $basename ) ) {
            if ( $obj->$basename ) {
                if ( MT->config( 'RebuildFilterDeleteFile' ) ) {
                    my $file  = $args{ File };
                    require MT::FileMgr;
                    my $fmgr = MT::FileMgr->new( 'Local' ) or die MT::FileMgr->errstr;
                    if ( $fmgr->exists( $file ) ) {
                        $fmgr->delete( $file );
                    }
                }
                MT->instance->request( '__cached_maps', {} );
                MT->instance->request( '__published:' . $obj->blog_id, {} );
                return undef;
            }
        }
    }
    return 1;
}

1;