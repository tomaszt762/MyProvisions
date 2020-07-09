resource "aws_key_pair" "key" {
    key_name = "mykeypair"
    public_key = "${file("./mykey.pub")}"
}
