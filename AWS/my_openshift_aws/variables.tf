#Common
variable "aws_access_key_id" { type = string }
variable "aws_secret_access_key" { type = string }
variable "default_tags" { default = { "owner" = "ocp42" } }
variable "aws_region" {
  type    = string
  default = "us-east-2"
}
#VPC Module
variable "infrastructure_id" { default = "ocp42-abcde" }
variable "cidr_block" {
  type    = string
  default = "10.10.0.0/16"
}
variable "aws_azs" { default = ["a", "b", "c"] }
variable "vpc_private_subnet_cidrs" { default = ["10.10.10.0/24", "10.10.11.0/24", "10.10.12.0/24"] }
/*
variable "clustername" { type = string }
variable "private_vpc_cidr" { default = "10.10.0.0/16" }
variable "vpc_public_subnet_cidrs" { default = ["10.10.20.0/24","10.10.21.0/24","10.10.22.0/24"] }
variable "domain" { }
variable "ami" { default = "ami-005141ec3f197b7be" }
variable "cluster_network_cidr" { default = "192.168.0.0/17" }
variable "cluster_network_host_prefix" { default = "23" }
variable "service_network_cidr" { default = "192.168.128.0/24" }
variable "bootstrap" { default = { type = "i3.xlarge"} }
variable "control_plane" { default = { count = "3", type = "m4.xlarge", disk = "120"} }
variable "worker" {        default = { count = "3", type = "m4.large",  disk = "120"} }
variable "openshift_pull_secret" { default = "./openshift_pull_secret.json" }
variable "use_worker_machinesets" { default = true }
variable "openshift_installer_url" { default = "https://mirror.openshift.com/pub/openshift-v4/clients/ocp/latest" }
*/