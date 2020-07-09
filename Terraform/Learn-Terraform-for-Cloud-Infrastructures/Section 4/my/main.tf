provider "aws" {
  region                      = var.region
  skip_credentials_validation = true
  skip_requesting_account_id  = true
  skip_metadata_api_check     = true
  s3_force_path_style         = true
  access_key                  = "anaccesskey"
  secret_key                  = "asecretkey"

  endpoints {
    s3 = "http://localhost:4572"
  }

}
// tmp//  data "aws_caller_identity" "my_account" {}


resource "aws_s3_bucket" "my_bucket" {
  // tmp// bucket = "my—s3—bucket—${data.aws_caller_identity.my_account.account_id}"
  bucket = var.bucket_name
  region = var.region
  acl    = "public-read" //private

  versioning {
    enabled = true
  }

  lifecycle_rule {
    prefix  = "files/"
    enabled = true

    noncurrent_version_transition {
      days          = 30
      storage_class = "STANDARD_IA"
    }

    noncurrent_version_transition {
      days          = 60
      storage_class = "GLACIER"
    }

    noncurrent_version_expiration {
      days = 90
    }
  }

  tags = {
    Type = "LOG"
    Tier = "STANDARD"
  }
}

resource "aws_s3_bucket_policy" "my_bucket_policy" {
  bucket = aws_s3_bucket.my_bucket.id
  policy = <<POLICY
{
  "Version": "2012—10—17",
  "Id": "MyBucketPolicy",
  "Statement": [
    {
      "Sid": "IPAllow",
      "Effect": "Deny",
      "Principal": "*",
      "Action": "s3:*",
      "Resource": "arn:aws:s3:::${aws_s3_bucket.my_bucket.bucket}/*",
      "Condition": {
      "IpAddress": {"aws:SourceIp": "4.4.4.4/32"}
      }
    }
  ]
}
POLICY
}


resource "aws_s3_bucket_object" "readme_file" {
  bucket       = aws_s3_bucket.my_bucket.bucket
  key          = "files/readme.txt"
  content_type = "text/plain"
  source       = "readme.txt"
  etag         = filemd5("readme.txt")
}
