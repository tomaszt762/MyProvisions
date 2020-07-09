output "bucket_arn" {
  value = "${aws_s3_bucket.remote_state.arn}"
}
