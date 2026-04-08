$ErrorActionPreference = "Stop"

Add-Type -AssemblyName System.Drawing

function Save-ThumbJpeg {
    param(
        [Parameter(Mandatory = $true)][string]$InPath,
        [Parameter(Mandatory = $true)][string]$OutPath,
        [Parameter(Mandatory = $true)][int]$Size
    )

    $img = [System.Drawing.Image]::FromFile($InPath)
    try {
        $side = [Math]::Min($img.Width, $img.Height)
        $sx = [int](($img.Width - $side) / 2)
        $sy = [int](($img.Height - $side) / 2)

        $bmp = New-Object System.Drawing.Bitmap $Size, $Size
        try {
            $g = [System.Drawing.Graphics]::FromImage($bmp)
            try {
                $g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
                $g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
                $g.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality

                $g.DrawImage(
                    $img,
                    (New-Object System.Drawing.Rectangle 0, 0, $Size, $Size),
                    (New-Object System.Drawing.Rectangle $sx, $sy, $side, $side),
                    [System.Drawing.GraphicsUnit]::Pixel
                )
            } finally {
                $g.Dispose()
            }

            $outDir = Split-Path -Parent $OutPath
            if (-not (Test-Path $outDir)) {
                New-Item -ItemType Directory -Path $outDir | Out-Null
            }

            $jpegCodec = [System.Drawing.Imaging.ImageCodecInfo]::GetImageEncoders() |
                Where-Object { $_.MimeType -eq "image/jpeg" } |
                Select-Object -First 1

            $encParams = New-Object System.Drawing.Imaging.EncoderParameters 1
            $encParams.Param[0] = New-Object System.Drawing.Imaging.EncoderParameter(
                [System.Drawing.Imaging.Encoder]::Quality,
                82L
            )

            $bmp.Save($OutPath, $jpegCodec, $encParams)
        } finally {
            $bmp.Dispose()
        }
    } finally {
        $img.Dispose()
    }
}

$root = Split-Path -Parent $MyInvocation.MyCommand.Path | Split-Path -Parent
Set-Location $root

$pairs = @(
    @{ in = "public/images/icon/woman1.jpg"; out = "public/images/icon/woman1_thumb.jpg" },
    @{ in = "public/images/icon/woman2.jpg"; out = "public/images/icon/woman2_thumb.jpg" },
    @{ in = "public/images/icon/men.jpg";    out = "public/images/icon/men_thumb.jpg" }
)

foreach ($p in $pairs) {
    if (Test-Path $p.in) {
        Save-ThumbJpeg -InPath $p.in -OutPath $p.out -Size 96
    } else {
        Write-Warning "Missing: $($p.in)"
    }
}

Get-ChildItem "public/images/icon/*_thumb.jpg" | Select-Object Name, Length | Format-Table -AutoSize

