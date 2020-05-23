export function initCropper(options) {
    let self = options; 

    // 初期設定
    let initOptions =
    {
        //オプション(公式ドキュメントはこちら: https://github.com/fengyuanchen/cropperjs#options)
        aspectRatio: 1 / 1,
        viewMode: 3,
        dragMode: 'move',
        cropBoxMovable: false,
        cropBoxResizable: false,
        modal: false,
        background: false,
        autoCropArea:1,
        
        crop: function(e) {
            var cropData = $('#js-resize__img').cropper('getData');
        self.$x.val(Math.floor(cropData.x));
        self.$y.val(Math.floor(cropData.y));
        self.$w.val(Math.floor(cropData.width));
        self.$h.val(Math.floor(cropData.height));
        },
    }

    // 初期設定をセットする
    self.$cropTarget.cropper(initOptions);

    // 画像をセットし、cropperを表示
    self.$cropTarget.cropper('replace', URL.createObjectURL(self.file));
    self.$cropModal.show();
        
}

export function setCropData(options) {
    let self = options; 

    self.formData.append('file', self.file);
    self.formData.append('postType', self.postType);
    self.formData.append('crop-x', self.x);
    self.formData.append('crop-y', self.y);
    self.formData.append('crop-w', self.w);
    self.formData.append('crop-h', self.h);
    
    console.log('self.isUserEdit');
    console.log(self.isUserEdit);
    //プロフィール編集ならユーザーIDを、記事編集なら記事IDを格納
    if (self.isUserEdit) {
        self.formData.append('user_id', self.userId);
    } else {
        self.formData.append('article_id', self.articleId);
    }

    resetCropData(self);
}

export function resetCropData(options) {
    let self = options; 

    self.$cropModal.hide();
    self.$cropTarget.cropper('reset');
    self.$cropTarget.cropper('clear');
    self.$cropTarget.cropper('destroy');

    //連続して同じ画像を選択できるように（onChangeイベントなので）、inputタグの中身をリセット
    self.$headerImgFile.val('');
    
}