provider "aws" {
  region                      = "us-west-2"
  skip_credentials_validation = true
  skip_requesting_account_id  = true
  skip_metadata_api_check     = true
  s3_force_path_style         = true
  access_key                  = "anaccesskey"
  secret_key                  = "asecretkey"

  endpoints {
    s3 = "http://localhost:4566"
  }

}

resource "aws_s3_bucket" "website_bucket" {
  bucket = var.bucket_name
  acl    = "public-read"
   policy = <<POLICY
{
  "Version": "2012-10-17",
  "Statement": [{
    "Sid": "PublicReadAccessForWebsite",
    "Effect": "Allow",
    "Action": "s3:GetObject",
    "Principal": "*",
    "Resource": ["arn:aws:s3:::${var.bucket_name}/*"]
    }
  ]
}
POLICY

  website {
    index_document = "index.html"
    error_document = "error.html"
  }
}

resource "aws_s3_bucket_object" "index_html" {
  bucket       = aws_s3_bucket.website_bucket.id
  key          = "index.html"
  content_type = "text/html"

  source = "index.html"
}

resource "aws_s3_bucket_object" "error_html" {
  bucket       = aws_s3_bucket.website_bucket.id
  key          = "error.html"
  content_type = "text/html"

  source = "error.html"
}