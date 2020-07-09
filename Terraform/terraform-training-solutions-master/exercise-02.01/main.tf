# ---------------------------------------------------------------------------------------------------------------------
# CREATE A VERSIONED S3 BUCKET AS A TERRAFORM BACKEND AND A DYNAMODB TABLE FOR LOCKING
# ---------------------------------------------------------------------------------------------------------------------

provider "aws" {
  region                      = var.aws_region
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




resource "aws_s3_bucket" "remote_state" {
  bucket = var.bucket_name
  acl    = "private"

  versioning {
    enabled = true
  }
}
