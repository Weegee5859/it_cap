package itCapstoneProject;

import java.sql.*;
import java.util.ArrayList;
import java.util.Scanner;

import javax.swing.JFrame;

public class project {
 
	
	private static Connection conn;
	private static Scanner sc = new Scanner(System.in);


public static void main(String[] args)throws SQLException{
	int answer;
	project pr = new project();
	int choice = Integer.parseInt(sc.nextLine());
	switch(choice){
	
	case 1:
		pr.printCustomers();
		break;
	case 2: 
		pr.printOrderHistory();
		break;
	default:
		break;
	}

	do {
		try {
			//Class.forName("com.mysql.cj.jdbc.Driver").newInstance();
		conn = DriverManager.getConnection("jdbc:mysql://aws-project.cu4q9u3qbdkh.us-east-1.rds.amazonaws.com/Projectdb", "admin", "admin10_");
			//conn = DriverManager.getConnection("jdbc:mysql://sql110.epizy.com:3306/epiz_32739619_itcapstoneproject", "epiz_32739619", "YAs4V9ZkSn");
			//conn = DriverManager.getConnection("jdbc:mysql://sql110.epizy.com:3306/epiz_32739619_itcapstoneproject", "", "");
		System.out.println("Enter choice:");
		System.out.println("1. Print all customers ");
		System.out.println("2. Print order history ");
		
		}
	
		catch (Exception e){
			e.printStackTrace();
			
	}
		System.out.println();
		System.out.println("Do you want to continue: (1 - Yes or 0 - No) ?");
		answer = Integer.parseInt(sc.nextLine());
	}while(answer >= 1);
	System.out.println("Exit successfully!");
}
	//method prints order history
	private static void printOrderHistory() throws SQLException {
		System.out.println("Enter the customer's name: ");
		
		
		String name = sc.nextLine();
		Statement st = conn.createStatement();
	
		ResultSet rs = st.executeQuery("SELECT customerName, customerEmail, orderName, orderPrice, orderQuantity FROM customers, orders where customerName = '" + name + "'");
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
