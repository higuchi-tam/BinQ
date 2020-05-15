export function initCropper(options) {
    let self = options; 

    // 初期設定
    let initOptions =
    {
        aspectRatio: 1 / 1,
        viewMode: 1,
        dragMode: 'move',
        cropBoxMovable: false,
        cropBoxResizable: false,
        crop: function(e) {
            var cropData = $('#js-resize__img').cropper('getData');
        self.$x.val(Math.floor(cropData.x));
        self.$y.val(Math.floor(cropData.y));
        self.$w.val(Math.floor(cropData.width));
        self.$h.val(Math.floor(cropData.height));
        },
        // zoomable:false,
        minCropBoxWidth:375,
        minCropBoxHeight:375,
        maxCropBoxWidth:375,
        maxCropBoxHeight:375
    }

    // 初期設定をセットする
    self.$cropTarget.cropper(initOptions);

    // 画像をセットし、cropperを表示
    self.$cropTarget.cropper('replace', URL.createObjectURL(self.file));
    self.$cropModal.show();

    //連続して同じ画像を選択できるように（onChangeイベントなので）、inputタグの中身をリセット
    self.$headerImgFile.val('');
        
}

export function setCropData(options) {
    let self = options; 

    self.formData.append('file', self.file);
    self.formData.append('article_id', self.articleId);
    self.formData.append('postType', self.postType);
    self.formData.append('crop-x', self.x);
    self.formData.append('crop-y', self.y);
    self.formData.append('crop-w', self.w);
    self.formData.append('crop-h', self.h);

    self.$cropModal.hide();
    self.$cropTarget.cropper('reset');
    self.$cropTarget.cropper('clear');
    self.$cropTarget.cropper('destroy');
}