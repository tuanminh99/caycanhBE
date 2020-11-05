<?php
namespace App\Traits;
use Storage;
trait StorageImageTrait {
//    Truyền 3 tham số: $request để lấy từ các ô input, $fileName là name của cái input để lấy ảnh, $folderName là folder muốn lưu ảnh vào
    public function storageTraitUpload($request, $fieldName, $folderName) {
//        Kiểm tra xem người dùng có post ảnh lên hay không
        if ($request->hasFile($fieldName)) {
//            Lấy ra tên ảnh gốc (mảng)
            $file = $request->$fieldName;
//            Lay ten ảnh gốc
            $fileNameOrigin = $file->getClientOriginalName();
//            Tạo ra tên ảnh ngẫu nhiên = random 1 chuỗi 20 kí tự + tên ảnh gốc
            $fileNameHash = str_random(20). '.' . $file->getClientOriginalExtension();
//            Lưu ảnh vào storage
            $filePath = $request->file($fieldName)->storeAs('public/'. $folderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
              'file_name' => $fileNameOrigin,
              'file_path' => Storage::url($filePath)
            ];
//            tra ve duong dan anh
            return $dataUploadTrait;
        }
        return null;
    }

    public function storageTraitUploadMultiple($file, $folderName) {
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20). '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/'. $folderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
}
