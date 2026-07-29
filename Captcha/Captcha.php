<?php
		
	function DoGetTTFFontList()
	{
		$arrayTTFFontList = [];
		$arrayFilesNames = scandir(DoGetParentOrCurrentDir() . "Captcha/ttf_fonts");
				
		return $arrayFilesNames;
	}
		
	function DoGetRandomCaptchaFont()
	{
		$strFontClassName = "";
		$arrayFilesNames = DoGetTTFFontList();

		$nI =  rand(0, count($arrayFilesNames) - 1);
		$strFontFileName = $arrayFilesNames[$nI];
				
		return $strFontFileName;
	}
		
	function DoCreateCaptchaImageBG()
	{
		$image = imagecreatetruecolor(200, 50);
		imageantialias($image, true);
		$arrayColors = [];
		$nRed = rand(125, 175);
		$nGreen = rand(125, 175);
		$nBlue = rand(125, 175);
		for ($nI = 0; $nI < 5; $nI++)
		{
			$arrayColors[] = imagecolorallocate($image, $nRed - (20 * $nI), $nGreen - (20 * $nI), $nBlue - (20 * $nI));
		}
		imagefill($image, 0, 0, $arrayColors[0]);
		
		for ($nI = 0; $nI < 10; $nI++)
		{
			imagesetthickness($image, rand(2, 10));
			$nRectColor = $arrayColors[rand(1, 4)];
			imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), 
				rand(40, 60), $nRectColor);
		}
		return $image;
  	}
	
	function DoGenerateCaptchaString($nLength)
	{
		$strAllowedChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$strCaptchaText = "";
		
		for ($nI = 0; $nI < $nLength; $nI++)
		{
			$strCaptchaText .= $strAllowedChars[rand(0, strlen($strAllowedChars) - 1)];
		}
		return $strCaptchaText;
	}
	
	function DoGenerateCaptcha()
	{
		$strTTFFontFileName = DoGetRandomCaptchaFont();
		$strCaptchaText = DoGenerateCaptchaString(10);
		$_SESSION["strRandomCaptchaText"] = $strCaptchaText;		
		$image = DoCreateCaptchaImageBG();
		
		$black = imagecolorallocate($image, 0, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);
		$arrayTextColors = [$black, $white];
		
		/*
			function imagettftext(GdImage $image, float $size, float $angle, int $x, int $y, int $color,
			    string $font_filename, string $text, array $options = [])

			image: a GdImage object, returned by one of the image creation functions, such as imagecreatetruecolor().

			size: the font size in points.

			angle: the angle in degrees, with 0 degrees being left-to-right reading text. Higher values represent a 
					counter-clockwise rotation. For example, a value of 90 would result in bottom-to-top reading text.

			x: the coordinates given by x and y will define the basepoint of the first character (roughly the lower-left 
				corner of the character). This is different from the imagestring(), where x and y define the upper-left
				 corner of the first character. For example, "top left" is 0, 0.

			y: the y-ordinate. This sets the position of the fonts baseline, not the very bottom of the character.

			color: the color index. Using the negative of a color index has the effect of turning off antialiasing. See 
			imagecolorallocate().

			fontfile: the path to the TrueType font you wish to use. Depending on which version of the GD library PHP is 
			using, when fontfile does not begin with a leading / then .ttf will be appended to the filename and the library 
			will attempt to search for that filename along a library-defined font path. When using versions of the GD library 
			lower than 2.0.18, a space character, rather than a semicolon, was used as the 'path separator' for different font 
			files. Unintentional use of this feature will result in the warning message: Warning: Could not find/open font. For 
			these affected versions, the only solution is moving the font to a path which does not contain spaces.
			
			In many cases where a font resides in the same directory as the script using it the following trick will 
			alleviate any include problems.
			
			text: the text string in UTF-8 encoding.
		*/
		for ($nI = 0; $nI < strlen($strCaptchaText); $nI++)
		{
			$nLetterSpace = 170 / strlen($strCaptchaText);
  			imagettftext($image, 20, rand(-15, 15), 15 + ($nI * $nLetterSpace), rand(20, 40), 
  				$arrayTextColors[rand(0, 1)], DoGetParentOrCurrentDir() . "Captcha/ttf_fonts/" . $strTTFFontFileName, $strCaptchaText[$nI]);
		}
		
		// 1. Capture the raw image stream using output buffering 
		ob_start();
		
		// 2. Generates raw PNG stream
		imagepng($image);
		$imageData = ob_get_clean();
		
		// 3. Free up memory 
		imagedestroy($image);
		
		// 4. Encode to Base64
		$base64Image = base64_encode($imageData);
		
		$strHTMLCaptchaImage = "<img src=\"data:image/png;base64," . $base64Image . "\" alt=\"DYNAMICALLY GENERATED CAPTCHA IMAGE\" />";
		
		return $strHTMLCaptchaImage;
	}
	
?>