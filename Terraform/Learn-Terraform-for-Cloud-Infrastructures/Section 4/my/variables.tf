variable "region" {
  default = "us-west-2"
}

variable "aws_access_key_id" {
  type    = string
  default = "anaccesskey"

}
variable "aws_secret_access_key" {
  type = string

  default = "asecretkey"
}

variable "bucket_name" {
  default     = "test3"
  description = "The name to use for the S3 bucket. Note that S3 bucket names must be globally unique across all AWS users!"
}

