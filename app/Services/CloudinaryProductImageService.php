<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryProductImageService
{
    public function upload(
        $file,
        string $folder,
        array $tags = [],
        int $width = 800,
        int $height = 800
    ): string {
        $cloudinaryConfig = [];

        // Trong config/cloudinary.php của bạn, field `url` đã là string dạng cloudinary://...
        // Package cloudinary_php có thể xử lý `cloud_name/api_key/api_secret` ổn định hơn.
        // Tránh pass đồng thời `url` (string) gây lỗi importParams.
        $cloudinaryConfig['cloud_name'] = config('cloudinary.cloud_name');
        $cloudinaryConfig['api_key'] = config('cloudinary.api_key');
        $cloudinaryConfig['api_secret'] = config('cloudinary.api_secret');

        $cloudinary = new Cloudinary($cloudinaryConfig);

        // Cloudinary SDK nhận file path hoặc resource.
        // Với UploadedFile, có thể dùng getRealPath().
        $tmpPath = method_exists($file, 'getRealPath') ? $file->getRealPath() : null;
        if (!$tmpPath) {
            // Fallback: lưu tạm để upload
            $tmp = tempnam(sys_get_temp_dir(), 'cloudinary_');
            $file->move(dirname($tmp), basename($tmp));
            $tmpPath = $file->getRealPath();
        }

        $publicId = 'product_' . uniqid('', true);

        $result = $cloudinary->uploadApi()->upload($tmpPath, [
            'folder' => $folder,
            'public_id' => $publicId,
            'resource_type' => 'image',
            'tags' => $tags,
        ]);

        // Lấy secure_url và resize theo yêu cầu hiện tại
        // Nếu bạn muốn ảnh hiển thị nhiều size, có thể dùng transformation.
        // Ở đây lưu link (đã resize) để hiển thị nhanh.
        $url = $result['secure_url'] ?? $result['url'] ?? '';
        if (!$url) {
            throw new \RuntimeException('Cloudinary upload failed: missing url');
        }

        return $this->buildResizedUrl($cloudinary, $url, $width, $height);
    }

    private function buildResizedUrl(Cloudinary $cloudinary, string $url, int $width, int $height): string
    {
        // Hiện tại trả URL gốc từ Cloudinary.
        // Nếu bạn muốn link đã resize/format có thể bổ sung transformation sau.
        return $url;
    }
}


