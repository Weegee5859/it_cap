package itCapstoneProject;

import java.sql.*;
import java.util.Scanner;
import java.util.*;

public class project {

	
	private static Connection conn;
	private static Scanner sc = new Scanner(System.in);
	

public static void main(String[] args){
	
	project pr = new project();
		try {
		
		
		conn = DriverManager.getConnection("jdbc:mysql://aws-project.cu4q9u3qbdkh.us-east-1.rds.amazonaws.com/Projectdb", "admin", "admin10_");
		
		System.out.println("Enter choice:");
		System.out.println("1. Print all customers ");
		System.out.println("2. Print order history ");
		
		
		
		int choice = Integer.parseInt(sc.nextLine());
		switch(choice) {
		case 1:
			project.printCustomers();
			break;
		case 2: 
			project.printOrderHistory();
			break;
		default:
			break;
		
		}
		}catch (Exception e){
			e.printStackTrace();
			
	}
}
	//method prints order history
	private static void printOrderHistory() throws SQLException {
		
		Statement st = conn.createStatement();
		ResultSet rs = st.executeQuery("select customerName, orderName, orderPrice, orderQuantity from customers, orders");
		ResultSetMetaData rsmd = rs.getMetaData();
		int colCount = rsmd.getColumnCount();
		 
		for(int i = 1; i<=colCount; ++i) {
			 System.out.print(rsmd.getColumnLabel(i) + "\t\t           ");
		 }
		System.out.println();
		
		while(rs.next()) {
			for(int i = 1; i<=colCount; ++i) {
				System.out.print(rs.getString(i) + "\t\t                  ");
			}
			System.out.println();
		}
		rs.close();
		st.close();
		conn.close();
		
	}
     //method prints all customers and their login information
	private static void printCustomers() throws SQLException {
	
		Statement st = conn.createStatement();
		ResultSet rs = st.executeQuery("select customerName, customerEmail, customerPassword from customers");
		ResultSetMetaData rsmd = rs.getMetaData();
		int colCount = rsmd.getColumnCount();
		 
		for(int i = 1; i<=colCount; ++i) {
			 System.out.print(rsmd.getColumnLabel(i) + "\t\t           ");
		 }
		System.out.println();
		
		while(rs.next()) {
			for(int i = 1; i<=colCount; ++i) {
				System.out.print(rs.getString(i) + "\t\t                  ");
			}
			System.out.println();
		}
		rs.close();
		st.close();
		conn.close();
		
	}
}
