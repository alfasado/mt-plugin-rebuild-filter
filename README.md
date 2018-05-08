# RebuildFilter プラグイン


## 概要

Movable Type / PowerCMS で特定のアーカイブ出力を止めるプラグインです。

## 動作環境

- PowerCMS ver.4 がインストールされている環境

## インストール

圧縮ファイル **mt-plugin-rebuild-filter-master.zip** を解凍し、サーバ上に設置します。

※ 以降 `/path/to/mt/` はMovable Type を設置しているディレクトリに読み替えて下さい。
```
/path/to/mt/plugins/RebuildFilter
```
※ `plugins` ディレクトリがない場合は Movable Type 設置ディレクトリに作成してください。

## 使い方
1. カスタムフィールドで出力制御用のチェックボックスを作成
- システムオブジェクト: アーカイブに合わせる (カテゴリ、記事など)
- 種類: チェックボックス
- ラベル: このアーカイブを出力しない
- ベースネーム: アーカイブによって変わる ※1

※1 アーカイブのタイプごとのベースネーム
<table>
<tr><th>記事の場合</th><td>entryfilter</td></tr>
<tr><th>ウェブページの場合</th><td>pagefilter</td></tr>
<tr><th>カテゴリの場合</th><td>categoryfilter</td></tr>
<tr><th>フォルダの場合</th><td>folderfilter</td></tr>
</table>

2. 設定後に指定したアーカイブが出力されないことを確認

## カスタムフィールドのベースネームを変更したい場合
「entryfilter」などのベースネームをすでに別の
カスタムフィールドで使用している場合は、環境変数で
ベースネームを変更することが可能です。

mt-config.cgiに記載する環境変数
<table>
<tr><th>ブログ記事</th><td>IndividualFilterBasename</td></tr>
<tr><th>ウェブページ</th><td>PageFilterBasename</td></tr>
<tr><th>カテゴリ</th><td>CategoryFilterBasename</td></tr>
<tr><th>フォルダ</th><td>FolderFilterBasename</td></tr>
</table>

例)
IndividualFilterBasename entryfilternopublish

## 制限事項

- 重複チェック機能は Movable Type の機能変更の内容によっては
  改修が必要になります。

## 更新履歴

- README を追加 (2018年5月7日)
- ver.1.0 (2016年1月14日) 作成

## 奥付

- Alfasado Inc.
- https://alfasado.net/
- 2018年5月7日
