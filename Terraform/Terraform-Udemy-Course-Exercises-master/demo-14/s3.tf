resource "aws_s3_bucket" "mybucket" {
    bucket = "mybucket-w989804109"
    acl = "private"
    force_destroy = "true"
    tags = {
        Name  = "mybucket-w989804109"
        }     
}
