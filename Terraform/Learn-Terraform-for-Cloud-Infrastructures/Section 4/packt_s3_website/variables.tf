variable "region" {
  default = "us-west-2"
}

variable "bucket_name" {
  default     = "test3"
  description = "The name to use for the S3 bucket. Note that S3 bucket names must be globally unique across all AWS users!"
}