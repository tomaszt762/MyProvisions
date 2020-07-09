provider "aws" {
  region                      = var.region
 skip_credentials_validation = true
 skip_requesting_account_id  = true
 skip_metadata_api_check     = true
  access_key                  = var.aws_access_key_id
  secret_key                  = var.aws_secret_access_key

  endpoints {
    ec2 = "http://localhost:4566"
  }

}

// tmp// data "aws_caller_identity" "my_account" {}


resource "aws_s3_bucket" "my_bucket" {
// tmp// bucket = "my—s3—bucket—${data.aws_caller_identity.my_account.account_id}"
bucket = "mys3bucket78"
  region = var.region
  tags = {
    Type = "LOG"
    Tier = "STANDARD"
  }
}
/*
resource "aws_s3_bucket_object" "readme_file" {
  bucket = aws_s3_bucket.my_bucket.bucket
  key = "files/readme.txt"
  content_type = "text/html"
  source = "readme.txt"
}
*/