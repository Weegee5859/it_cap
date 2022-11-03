package projectItCapstone;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableModel;
import javax.swing.AbstractButton;
import javax.swing.JButton;
import java.awt.Font;
import javax.swing.JTextField;
import javax.swing.JEditorPane;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;
import java.awt.event.ActionEvent;
import javax.swing.JTable;
import javax.swing.JScrollBar;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;
import javax.swing.SwingConstants;

public class DisplayData extends JFrame {

	private JPanel btnPrintCustm;
	private JTextField txtEnterName;
	private JTable table;
	private JButton btnClear;
	private JScrollPane scrollPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					DisplayData frame = new DisplayData();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public DisplayData() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(200, 200, 750, 400);
		btnPrintCustm = new JPanel();
		btnPrintCustm.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(btnPrintCustm);
		btnPrintCustm.setLayout(null);
		
		JButton PrintCustomersName = new JButton("Print Customers");
		PrintCustomersName.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				try {
					Connection conn = DriverManager.getConnection("jdbc:mysql://ns1096.ifastnet.com/itcapsto_projectdatabase", "itcapsto_admin", "OHS5wa+}pf2%");
					Statement st = conn.createStatement();
					ResultSet rs = st.executeQuery("select customerName, customerEmail, customerPassword from customers");
					
					ResultSetMetaData rsmd = rs.getMetaData();
					DefaultTableModel model = (DefaultTableModel) table.getModel();
				
						int cols = rsmd.getColumnCount();
						String[]colName = new String[cols];
						for(int i =0; i<cols; i++) {
							colName[i] = rsmd.getColumnName(i+1);
						model.setColumnIdentifiers(colName);
						}
						String custName, custEmail, custPassword;
						while(rs.next()) {
							custName = rs.getString(1);
							custEmail = rs.getString(2);
							custPassword = rs.getString(3);
							String[] row = {custName, custEmail, custPassword};
							model.addRow(row);
							
						}
				st.close();
				conn.close();
				
				} catch (SQLException e2) {
					
					e2.printStackTrace();
				}
				
			}
		});
		PrintCustomersName.setFont(new Font("Tahoma", Font.BOLD, 11));
		PrintCustomersName.setBounds(53, 33, 139, 41);
		btnPrintCustm.add(PrintCustomersName);
		
		
		JButton btnOrderHistory = new JButton("Print Order History");
		btnOrderHistory.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				try {
				
				Connection conn = DriverManager.getConnection("jdbc:mysql://ns1096.ifastnet.com/itcapsto_projectdatabase", "itcapsto_admin", "OHS5wa+}pf2%");
				Statement st = conn.createStatement();
				
				String name = txtEnterName.getText();
				ResultSet rs = st.executeQuery("SELECT customerName, customerEmail, orderName, orderPrice, orderQuantity FROM customers, orders where customerName = '" + name + "'");
				
				ResultSetMetaData rsmd = rs.getMetaData();
				DefaultTableModel model = (DefaultTableModel) table.getModel();
			
					int cols = rsmd.getColumnCount();
					String[]colName = new String[cols];
					for(int i =0; i<cols; i++) {
						colName[i] = rsmd.getColumnLabel(i+1);
					model.setColumnIdentifiers(colName);
					}
					String custName, custEmail, orderName, orderPrice, orderQuantity;
					while(rs.next()) {
						custName = rs.getString(1);
						custEmail = rs.getString(2);
						orderName = rs.getString(3);
						orderPrice = rs.getString(4);
						orderQuantity = rs.getString(5);
						String[] row = {custName, custEmail, orderName, orderPrice, orderQuantity};
						model.addRow(row);
						
					}
			st.close();
			conn.close();
			
			}catch(SQLException e1) {
				
				e1.printStackTrace();
			}
				
			}
		});
		btnOrderHistory.setFont(new Font("Tahoma", Font.BOLD, 11));
		btnOrderHistory.setBounds(567, 105, 139, 41);
		btnPrintCustm.add(btnOrderHistory);
		
		scrollPane = new JScrollPane();
		scrollPane.setBounds(92, 182, 545, 120);
		btnPrintCustm.add(scrollPane);
		
		table = new JTable();
		scrollPane.setViewportView(table);
		
		btnClear = new JButton("Clear");
		btnClear.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				table.setModel(new DefaultTableModel());
			}
		});
		btnClear.setFont(new Font("Tahoma", Font.BOLD, 11));
		btnClear.setBounds(245, 33, 139, 41);
		btnPrintCustm.add(btnClear);
		
		txtEnterName = new JTextField();
		txtEnterName.setOpaque(false);
		txtEnterName.setToolTipText("");
		txtEnterName.setHorizontalAlignment(SwingConstants.CENTER);
		txtEnterName.setBounds(437, 105, 106, 41);
		btnPrintCustm.add(txtEnterName);
		txtEnterName.setText("Enter name");
		txtEnterName.setColumns(10);
		
		JTextArea txtrEnterNameAnd = new JTextArea();
		txtrEnterNameAnd.setLineWrap(true);
		txtrEnterNameAnd.setEditable(false);
		txtrEnterNameAnd.setText("Enter name and then click the print order history button");
		txtrEnterNameAnd.setBounds(437, 33, 269, 41);
		btnPrintCustm.add(txtrEnterNameAnd);
	}
}
